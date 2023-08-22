<?php

namespace Src\Modules\Blog\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\Modules\Blog\Infrastructure\Persistence\Category;

interface ICategoryRepository
{
    public function getCategory(array $data, array $columns = null): ?Category;

    public function getAllCategories(array $columns = null): ?Collection;

    public function save(array $data, bool $update = false): void;

    public function delete(array $data): void;
}
