<?php

namespace Src\Posts\Application;

use Src\Posts\Domain\Contracts\PostRepositoryContract;

class DeletePostUseCase
{
    /**
     * property repository
     *
     * @var PostRepository
     */
    protected $repository;

    public function __construct(PostRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function execute(int $id)
    {
        return $this->repository->deletePost($id);
    }
}
