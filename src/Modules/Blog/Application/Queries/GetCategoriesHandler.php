<?php

namespace Src\Modules\Blog\Application\Queries;

use Src\Common\UseCases;
use Src\Common\Exceptions\EntityNotFoundException;
use Src\Modules\Blog\Domain\Entities\CategoryEntity;
use Src\Modules\Blog\Domain\Contracts\ICategoryRepository;

class GetCategoriesHandler extends UseCases
{
    public function __construct(private readonly ICategoryRepository $repository) { }

    public function getCategory(mixed $category)
    {
        $columns = array('id', 'name');

        $data = ['slug' => $category];

        if (ctype_digit($category))
            $data = ['id' => (int) $category];

        try {
            $category = $this->repository->getCategory(
                new CategoryEntity($data),
                $data[key($data)],
                $columns
            );

            return !is_null($category)
                ?   $category
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage());
        }
    }
}
