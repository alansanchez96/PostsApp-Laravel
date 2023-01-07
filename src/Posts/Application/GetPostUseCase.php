<?php

namespace Src\Posts\Application;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Src\Posts\Domain\Contracts\PostRepositoryContract;

class GetPostUseCase
{
    /**
     * Repository property
     *
     * @var PostRepository
     */
    private $repository;

    public function __construct(PostRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtiene el Model Post y devuelve el Model consultado
     *
     * @param mixed $post
     * @return Model|Collection|Builder
     */
    public function execute(mixed $post): Model|Collection|Builder
    {
        return $this->repository->getPost($post);
    }
}
