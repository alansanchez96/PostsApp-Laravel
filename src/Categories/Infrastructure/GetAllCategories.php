<?php

namespace Src\Categories\Infrastructure;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Src\Categories\Application\GetAllCategoriesUseCase;

class GetAllCategories
{
    /**
     * Use case GetAllCategories
     *
     * @var GetAllCategoriesUseCase
     */
    protected $getAllCategories;

    public function __construct(GetAllCategoriesUseCase $getAllCategories)
    {
        $this->getAllCategories = $getAllCategories;
    }

    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return Collection|SupportCollection
     */
    public function getAllCategories(bool $pluck = false, string $column = null, mixed $key = null): Collection|SupportCollection
    {
        return $this->getAllCategories->execute($pluck, $column, $key);
    }
}
