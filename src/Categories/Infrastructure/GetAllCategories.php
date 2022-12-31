<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\GetAllCategoriesUseCase;

class GetAllCategories
{
    protected $getAllCategories;

    public function __construct(GetAllCategoriesUseCase $getAllCategories)
    {
        $this->getAllCategories = $getAllCategories;
    }

    public function getAllCategories(bool $pluck = false, string $column = null, mixed $key = null)
    {
        return $this->getAllCategories->execute($pluck, $column, $key);
    }
}
