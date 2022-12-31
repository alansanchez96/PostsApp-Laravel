<?php

namespace Src\Categories\Application;

use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class GetAllCategoriesUseCase
{
    private $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(bool $pluck = false, string $column = null, mixed $key = null)
    {
        return $this->repository->getAllCategories($pluck, $column, $key);
    }
}
