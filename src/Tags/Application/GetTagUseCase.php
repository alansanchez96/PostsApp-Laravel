<?php

namespace Src\Tags\Application;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Src\Tags\Domain\Contract\TagRepositoryContract;

class GetTagUseCase
{
    /**
     * Repository property
     *
     * @var TagRepository
     */
    protected $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtiene el Model Tag y devuelve el Model consultado
     *
     * @param mixed $tag
     * @return Model|Collection|Builder
     */
    public function execute(mixed $tag): Model|Collection|Builder
    {
        return $this->repository->getTag($tag);
    }
}
