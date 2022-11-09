<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\GetAllCategoriesUserCase;

class GetAllCategories
{
    private $getAllCategories;

    public function __construct(GetAllCategoriesUserCase $getAllCategories)
    {
        $this->getAllCategories = $getAllCategories;
    }

    public static function execute()
    {
        
    }
}
