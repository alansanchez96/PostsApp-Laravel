<?php

namespace Src\Modules\Blog\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blog\Domain\Entities\CategoryEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Category;

interface ICategoryRepository
{
    public function getCategory(CategoryEntity $entity, mixed $category, array $columns): ?Category;

    public function getAllCategories(array $columns): ?Collection;

    public function save(array $data, bool $update = false): void;

    public function delete(array $data): void;
}
