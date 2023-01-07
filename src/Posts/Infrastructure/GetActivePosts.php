<?php

namespace Src\Posts\Infrastructure;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Src\Posts\Application\GetActivePostsUseCase;

class GetActivePosts
{
    /**
     * Use case GetActivePost
     *
     * @var GetActivePostUseCase
     */
    private $getActivePosts;

    public function __construct(GetActivePostsUseCase $getActivePosts)
    {
        $this->getActivePosts = $getActivePosts;
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
        return $this->getActivePosts->execute($column, $pages);
    }
}
