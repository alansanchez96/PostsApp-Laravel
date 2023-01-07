<?php

namespace Src\Posts\Application;

use Illuminate\Pagination\Paginator;
use Src\Posts\Domain\Contracts\PostRepositoryContract;

class GetCategoryPostUseCase
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
     * Obtiene una paginacion del PostModel consultado relacionado a la categoria_id
     *
     * @param integer $id
     * @return Paginator
     */
    public function execute(int $id): Paginator
    {
        return $this->repository->getCategoryPost($id);
    }
}
