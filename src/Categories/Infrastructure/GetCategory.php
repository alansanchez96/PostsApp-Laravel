<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\GetCategoryUseCase;

class GetCategory
{
    private $getCategory;

    public function __construct(GetCategoryUseCase $getCategory)
    {
        $this->getCategory = $getCategory;
    }

    public function getCategory($slug)
    {
        return $this->getCategory->execute($slug);
    }
}
