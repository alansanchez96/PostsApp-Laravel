<?php

namespace Src\Categories\Infrastructure;

use Src\Categories\Application\DeleteCategoryUseCase;

class DeleteCategory
{
    /**
     * Use case DeleteCategory
     *
     * @var DeleteCategoryUseCase
     */
    protected $deleteCategory;

    /**
     * method construct
     *
     * @param DeleteCategoryUseCase $deleteCategory
     */
    public function __construct(DeleteCategoryUseCase $deleteCategory)
    {
        $this->deleteCategory = $deleteCategory;
    }

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function deleteCategory(int $id)
    {
        return $this->deleteCategory->execute($id);
    }
}
