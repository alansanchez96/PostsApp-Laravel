<?php

namespace Src\Categories\Application;

use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class GetCategoryUseCase
{
    private $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute($slug)
    {
        return $this->repository->getCategory($slug);
    }
}
