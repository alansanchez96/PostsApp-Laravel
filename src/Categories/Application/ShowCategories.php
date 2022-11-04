<?php

namespace Src\Categories\Application;

use Src\Categories\Domain\EloquentRepository\CategoryEntity;

class ShowCategories
{
    private $entity;

    public function __construct(CategoryEntity $entity)
    {
        $this->entity = $entity;
    }

    public function execute()
    {
        return $this->entity::all();
    }
}
