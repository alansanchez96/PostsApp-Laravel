<?php

namespace Src\Modules\Blog\Application\Queries;

use Src\Common\Interfaces\Laravel\EloquentModel;
use Src\Modules\Blog\Domain\Contracts\IPostRepository;

class SearchPostsQuery
{
    public function __construct(private readonly IPostRepository $repository) { }

    public function getPostsBy(EloquentModel $model, array $relationship, array $columns, int $pages = null)
    {
        return $this->repository->getPostsBy($model, $relationship, $columns, $pages);
    }
}
