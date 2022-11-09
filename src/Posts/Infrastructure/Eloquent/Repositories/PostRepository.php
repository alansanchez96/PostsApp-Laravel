<?php

namespace Src\Posts\Infrastructure\Eloquent\Repositories;

use Src\Posts\Domain\PostEntity;
use Src\Posts\Domain\ValueObjects\PostId;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Posts\Domain\Contracts\PostRepositoryContract;
use Src\Posts\Domain\ValueObjects\PostBody;
use Src\Posts\Domain\ValueObjects\PostExtract;
use Src\Posts\Domain\ValueObjects\PostStatus;
use Src\Posts\Domain\ValueObjects\PostTitle;

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

    public function getActivePosts()
    {
        $posts = $this->model->get();
        foreach ($posts as $post) {
            // TENGO QUE LEER EL STATUS DEL OBJETO!!
        }
        $actives = (new PostStatus($posts->status));
        return $this->model->where('status', 2)->latest('id')->paginate();
    }
}
