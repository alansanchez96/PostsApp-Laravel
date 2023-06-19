<?php

namespace Src\Modules\Blog\Domain\Contracts;

use Src\Modules\Blog\Domain\Entities\CategoryEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Category;

interface ICategoryRepository
{
    public function getCategory(CategoryEntity $entity, mixed $category, array $columns): ?Category;
}