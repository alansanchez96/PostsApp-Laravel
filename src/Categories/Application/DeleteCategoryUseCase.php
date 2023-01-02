<?php

namespace Src\Categories\Application;

use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class DeleteCategoryUseCase
{
    protected $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        return $this->repository->deleteCategory($id);
    }
}
