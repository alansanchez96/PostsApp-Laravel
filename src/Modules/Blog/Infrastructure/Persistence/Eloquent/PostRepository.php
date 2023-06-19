<?php

namespace Src\Modules\Blog\Infrastructure\Persistence\Eloquent;

use Src\Common\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Src\Common\Interfaces\Laravel\EloquentModel;
use Src\Modules\Blog\Domain\Entities\PostEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Post;
use Src\Modules\Blog\Domain\Contracts\IPostRepository;

class PostRepository extends BaseRepository implements IPostRepository
{
    public function __construct(private readonly Post $post) { }

    public function getActivePosts(int $pages = null): Collection|LengthAwarePaginator
    {
        try {
            return is_null($pages)
                ?   $this->post->query()->where('status', $this->post::ACTIVE)->latest('id')->get()
                :   $this->post->query()->where('status', $this->post::ACTIVE)->latest('id')->paginate($pages);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getPost(PostEntity $entity, mixed $post, array $columns): ?Post
    {
        try {
            return (is_int($post))
                ?   $this->post->select($columns)->find($entity->id->getId())
                :   $this->post->select($columns)->firstWhere('slug', $entity->slug->getSlug());
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getRelatedPosts(PostEntity $entity, array $columns): ?Collection
    {
        try {
            return $this->post
                ->select($columns)
                ->where('category_id', $entity->category_id->getId())
                ->where('status', $this->post::ACTIVE)
                ->where('id', '!=', $entity->id->getId())
                ->latest('id')
                ->take(4)
                ->get();
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getPostsBy(EloquentModel $model, array $relationship, array $columns, int $pages = null): Collection|LengthAwarePaginator
    {
        try {
            return is_null($pages)   
            ?   $this->post->select($columns)
                    ->whereHas($relationship['type'], function ($query) use ($relationship, $model) {
                        $query->where($relationship['key'], $model->id);
                    })
                    ->where('status', $this->post::ACTIVE)
                    ->latest('id')
                    ->get()
            :   $this->post->select($columns)
                    ->whereHas($relationship['type'], function ($query) use ($relationship, $model) {
                        $query->where($relationship['key'], $model->id);
                    })
                    ->where('status', $this->post::ACTIVE)
                    ->latest('id')
                    ->paginate($pages);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}
