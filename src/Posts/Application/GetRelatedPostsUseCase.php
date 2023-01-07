<?php

namespace Src\Posts\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Posts\Infrastructure\Eloquent\Repositories\PostRepository;

class GetRelatedPostsUseCase
{
    /**
     * Repository property
     *
     * @var PostRepository
     */
    private $repository;

    public function __construct()
    {
        $this->repository = new PostRepository;
    }

    /**
     * Obtiene el PostModel relacionado con CategoryModel
     *
     * @param mixed $post
     * @return Model|Builder|Collection
     */
    public function execute($post): Model|Builder|Collection
    {
        return $this->repository->getRelatedPosts($post);
    }
}
