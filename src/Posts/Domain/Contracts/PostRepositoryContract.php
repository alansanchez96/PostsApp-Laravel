<?php

namespace Src\Posts\Domain\Contracts;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Posts\Application\GetRelatedPostsUseCase;
use Illuminate\Support\Collection as SupportCollection;

interface PostRepositoryContract
{
    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return Collection|SupportCollection
     */
    public function getAllPosts(bool $pluck = false, string $column = null, mixed $key = null): Collection|SupportCollection;

    /**
     * Retorna un paginador de todos los Posts Activos
     *
     * @param string $column
     * @param integer $pages
     * @return Paginator|Builder
     */
    public function getActivePosts(string $column, int $pages): Paginator|Builder;

    /**
     * Obtiene el Model Post y devuelve el Model consultado
     *
     * @param mixed $post
     * @return Model|Collection|Builder
     */
    public function getPost(mixed $post): Model|Collection|Builder;

    /**
     * Obtiene el PostModel relacionado con CategoryModel
     *
     * @param mixed $post
     * @return Model|Builder|Collection
     */
    public function getRelatedPosts(GetRelatedPostsUseCase $post): Model|Builder|Collection;

    /**
     * Obtiene una paginacion del PostModel consultado relacionado a la categoria_id
     *
     * @param integer $id
     * @return Paginator
     */
    public function getCategoryPost(int $id): Paginator;

    /**
     * Recibe el request y almacena los registros
     *
     * @param mixed $req
     * @param string $url
     * @param integer|null $id
     * @return void
     */
    public function save(mixed $req, ?string $url = null, int $id = null): void;

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function deletePost(int $id): void;
}
