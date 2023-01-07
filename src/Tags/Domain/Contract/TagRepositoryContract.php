<?php

namespace Src\Tags\Domain\Contract;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

interface TagRepositoryContract
{

    /**
     * Obtiene un paginador con los Posts relacionados al TagModel recibido
     *
     * @param TagModel $tag
     * @return Paginator
     */
    public function getPostsRelatedToTags(TagModel $tag): Paginator;

    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return EloquentCollection|Collection
     */
    public function getAllTags(bool $pluck = false, string $column = null, mixed $key = null): EloquentCollection|Collection;

    /**
     * Obtiene el Model Tag y devuelve el Model consultado
     *
     * @param mixed $tag
     * @return Model|EloquentCollection|Builder
     */
    public function getTag(mixed $tag): Model|EloquentCollection|Builder;

    /**
     * Recibe el request por separado y almacena los registros
     *
     * @param mixed $reqName
     * @param mixed $reqSlug
     * @param mixed $reqColor
     * @param integer|null $id
     * @return void
     */
    public function save(mixed $reqName, mixed $reqSlug, mixed $reqColor, ?int $id = null): void;

    /**
     * Obtiene el ModelTag y elimina su registro
     *
     * @param integer $id
     * @return void
     */
    public function deleteTag(int $id): void;
}
