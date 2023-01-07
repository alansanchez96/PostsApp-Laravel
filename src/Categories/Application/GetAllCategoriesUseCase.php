<?php

namespace Src\Categories\Application;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class GetAllCategoriesUseCase
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
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return Collection|SupportCollection
     */
    public function execute(bool $pluck = false, string $column = null, mixed $key = null): Collection|SupportCollection
    {
        return $this->repository->getAllCategories($pluck, $column, $key);
    }
}
