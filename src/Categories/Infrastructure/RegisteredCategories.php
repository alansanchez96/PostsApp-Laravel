<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\ShowCategories;
use Src\Categories\Domain\EloquentRepository\CategoryEntity;

class RegisteredCategories
{
    public static function getAllCategories()
    {
        $categories = new ShowCategories(new CategoryEntity);

        return $categories->execute();
    }
}
