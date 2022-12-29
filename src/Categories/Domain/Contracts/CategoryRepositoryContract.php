<?php

namespace Src\Categories\Domain\Contracts;

interface CategoryRepositoryContract
{
    public function getAllCategories();

    public function getCategory($slug);

    public function save($reqName, $reqSlug, int $reqId = null);

    public function deleteCategory(int $id);
}
