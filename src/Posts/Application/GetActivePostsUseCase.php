<?php

namespace Src\Posts\Application;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Src\Posts\Domain\Contracts\PostRepositoryContract;

class GetActivePostsUseCase
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
     * Retorna un paginador de todos los Posts Activos
     *
     * @param string $column
     * @param integer $pages
     * @return Paginator|Builder
     */
    public function execute(string $column, int $pages): Paginator|Builder
    {
        return $this->repository->getActivePosts($column, $pages);
    }
}
