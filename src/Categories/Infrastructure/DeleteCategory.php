<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\DeleteCategoryUseCase;

class DeleteCategory
{
    protected $deleteCategory;

    public function __construct(DeleteCategoryUseCase $deleteCategory)
    {
        $this->deleteCategory = $deleteCategory;
    }

    public function deleteCategory(int $id)
    {
        return $this->deleteCategory->execute($id);
    }
}
