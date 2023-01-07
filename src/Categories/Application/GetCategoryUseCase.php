<?php

namespace Src\Categories\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class GetCategoryUseCase
{
    /**
     * Repository property
     *
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtiene la categoria y devuelve el modelo consultado
     *
     * @param $slug
     * @return Model|Collection|Builder
     */
    public function execute($slug): Model|Collection|Builder
    {
        return $this->repository->getCategory($slug);
    }
}
