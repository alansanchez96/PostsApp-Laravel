<?php

namespace Src\Categories\Application;

use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class SaveCategoryUseCase
{
    protected $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute($reqName, $reqSlug, int $id = null)
    {
        return $this->repository->save($reqName, $reqSlug, $id);
    }
}
