<?php

namespace Src\Posts\Infrastructure\Eloquent\Repositories;

use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Posts\Domain\Contracts\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
    private PostModel $model;

    public function __construct()
    {
        $this->model = new PostModel;
    }

    public function getAllPosts()
    {
        return $this->model->all();
    }

    public function getActivePosts($column, $pages)
    {
        return $this->model->where('status', 2)->latest($column)->paginate($pages);
    }
}
