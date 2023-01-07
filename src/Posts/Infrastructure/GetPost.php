<?php

namespace Src\Posts\Infrastructure;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Src\Posts\Application\GetPostUseCase;
use Illuminate\Database\Eloquent\Collection;
use Src\Posts\Application\GetCategoryPostUseCase;

class GetPost
{
    /**
     * Use case GetPost
     *
     * @var GetPostUseCase
     */
    private $getPost;

    /**
     * Use case GetCategoryPost
     *
     * @var GetCategoryPostUseCase
     */
    private $getCategoryPost;

    /**
     * method construct
     *
     * @param GetPostUseCase $getPost
     * @param GetCategoryPostUseCase $getCategoryPost
     */
    public function __construct(GetPostUseCase $getPost, GetCategoryPostUseCase $getCategoryPost)
    {
        $this->getPost = $getPost;
        $this->getCategoryPost = $getCategoryPost;
    }

    /**
     * Obtiene el Model Post y devuelve el Model consultado
     *
     * @param mixed $post
     * @return Model|Collection|Builder
     */
    public function getPost(mixed $post): Model|Collection|Builder
    {
        return $this->getPost->execute($post);
    }

    /**
     * Obtiene una paginacion del PostModel consultado relacionado a la categoria_id
     *
     * @param integer $id
     * @return Paginator
     */
    public function getCategoryPost(int $id): Paginator
    {
        return $this->getCategoryPost->execute($id);
    }
}
