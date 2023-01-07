<?php

namespace Src\Categories\Domain\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

interface CategoryRepositoryContract
{
    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return Collection|SupportCollection
     */
    public function getAllCategories(bool $pluck = false, string $column = null, mixed $key = null): Collection|SupportCollection;

    /**
     * Obtiene la categoria y devuelve el modelo consultado
     *
     * @param $slug
     * @return Model|Collection|Builder
     */
    public function getCategory($slug): Model|Collection|Builder;

    /**
     * Recibe el request por separado y almacena los registros.
     *
     * @param $reqName
     * @param $reqSlug
     * @param integer|null $id
     * @return void
     */
    public function save($reqName, $reqSlug, int $id = null): void;

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function deleteCategory(int $id): void;
}
