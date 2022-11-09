<?php

namespace Src\Categories\Infrastructure\Eloquent\Repositories;

use Src\Categories\Domain\Contracts\CategoryRepositoryContract;
use Src\Categories\Infrastructure\Eloquent\CategoryModel;

class CategoryRepository implements CategoryRepositoryContract
{
    private CategoryModel $model;

    public function __construct()
    {
        $this->model = new CategoryModel;
    }

    public function getAllCategories()
    {
        return $this->model->all();
    }
}
