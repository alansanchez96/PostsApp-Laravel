<?php

namespace Src\Posts\Infrastructure\Eloquent\Repositories;

use Src\Posts\Domain\ValueObjects\PostSlug;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Posts\Domain\Contracts\PostRepositoryContract;

class PostRepository implements PostRepositoryContract
{
    /**
     * PostModel property
     *
     * @var PostModel
     */
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

    public function getPost($post)
    {
        $slug = (new PostSlug($post))->value();
        return $this->model->firstWhere('slug', $slug);
    }

    public function getRelatedPosts($post)
    {
        return $this->model->where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();
    }

    public function getCategoryPost($id)
    {
        return $this->model::where('category_id', $id)
            ->where('status', 2)
            ->latest('id')
            ->simplePaginate(6);
    }
}
