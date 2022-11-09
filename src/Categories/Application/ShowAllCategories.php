<?php

namespace Src\Categories\Application;

use Src\Categories\Infrastructure\Eloquent\CategoryModel;

class ShowAllCategories
{
    private $model;

    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    public function execute()
    {
        return $this->model::all();
    }
}
