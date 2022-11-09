<?php

namespace Src\Posts\Application;

use Src\Posts\Domain\Contracts\PostRepositoryContract;
use Src\Posts\Infrastructure\Eloquent\Repositories\PostRepository;

class GetActivePostsUserCase
{
    private $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->getActivePosts();
    }
}
