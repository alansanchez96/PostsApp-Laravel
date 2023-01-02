<?php

namespace Src\Posts\Application;

use Src\Posts\Infrastructure\Eloquent\Repositories\PostRepository;

class GetRelatedPostsUseCase
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PostRepository;
    }

    public function execute($post)
    {
        return $this->repository->getRelatedPosts($post);
    }
}
