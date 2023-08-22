<?php

namespace Src\Modules\Blog\Application\Queries;

use Src\Common\UseCases;
use Src\Modules\Blog\Domain\Entities\TagEntity;
use Src\Common\Exceptions\EntityNotFoundException;
use Src\Modules\Blog\Domain\Contracts\ITagRepository;

class GetTagsHandler extends UseCases
{
    public function __construct(private readonly ITagRepository $repository) { }

    public function getTag(mixed $tag)
    {
        $columns = array('id', 'name', 'slug', 'color');

        $data = ['slug' => $tag];

        if (ctype_digit($tag))
            $data = ['id' => (int) $tag];

        try {
            $tag = $this->repository->getTag(
                new TagEntity($data),
                $data[key($data)],
                $columns
            );

            return !is_null($tag)
                ?   $tag
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getAllTags(array $columns = null)
    {
        return $this->repository->getAllTags($columns);
    }

    public function getColorsTag(): array
    {
        return [
            'red'       =>  'Rojo',
            'blue'      =>  'Azul',
            'yellow'    =>  'Amarillo',
            'green'     =>  'Verde',
            'indigo'    =>  'Indigo',
            'purple'    =>  'Purpura',
            'pink'      =>  'Rosa',
        ];
    }
}
