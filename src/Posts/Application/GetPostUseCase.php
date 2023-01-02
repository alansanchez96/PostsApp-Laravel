<?php

namespace Src\Posts\Application;

use Src\Posts\Domain\Contracts\PostRepositoryContract;

class GetPostUseCase
{
    private $repository;

    public function __construct(PostRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute($post)
    {
        return $this->repository->getPost($post);
    }
}
