<?php

namespace Src\Posts\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Posts\Application\GetRelatedPostsUseCase;

class GetRelatedPosts
{
    /**
     * Use case GetRelatedPosts
     *
     * @var GetRelatedPostsUseCase
     */
    private $getRelatedPosts;

    public function __construct()
    {
        $this->getRelatedPosts = new GetRelatedPostsUseCase;
    }

    /**
     * Obtiene y retorna el PostModel relacionado con CategoryModel
     *
     * @param mixed $post
     * @return Model|Builder|Collection
     */
    public function execute(mixed $post): Model|Builder|Collection
    {
        return $this->getRelatedPosts->execute($post);
    }
}
