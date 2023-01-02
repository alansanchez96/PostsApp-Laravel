<?php

namespace Src\Posts\Application;

use Src\Posts\Domain\Contracts\PostRepositoryContract;

class SavePostUseCase
{
    protected $repository;

    public function __construct(PostRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(mixed $req, $url, int $id = null)
    {
        return $this->repository->save($req, $url, $id);
    }
}
