<?php

namespace Src\Categories\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Categories\Application\GetCategoryUseCase;

class GetCategory
{
    /**
     * Use case GetCategory
     *
     * @var GetCategoryUseCase
     */
    private $getCategory;

    public function __construct(GetCategoryUseCase $getCategory)
    {
        $this->getCategory = $getCategory;
    }

    /**
     * Obtiene la categoria y devuelve el modelo consultado
     *
     * @param $slug
     * @return Model|Collection|Builder
     */
    public function getCategory($slug): Model|Collection|Builder
    {
        return $this->getCategory->execute($slug);
    }
}
