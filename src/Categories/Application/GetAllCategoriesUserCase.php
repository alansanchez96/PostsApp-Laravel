<?php

namespace Src\Categories\Application;

use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class GetAllCategoriesUserCase
{
    private $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->getAllCategories();
    }
}
