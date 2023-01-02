<?php

namespace Src\Categories\Domain\Contracts;

interface CategoryRepositoryContract
{
    public function getAllCategories(bool $pluck = false, string $column = null, mixed $key = null);

    public function getCategory($slug);

    public function save($reqName, $reqSlug, int $reqId = null);

    public function deleteCategory(int $id);
}
