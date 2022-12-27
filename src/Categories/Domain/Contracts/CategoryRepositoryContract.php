<?php

namespace Src\Categories\Domain\Contracts;

interface CategoryRepositoryContract
{
    public function getAllCategories();

    public function getCategory($slug);
}
