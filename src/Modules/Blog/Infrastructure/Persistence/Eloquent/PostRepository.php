<?php

namespace Src\Modules\Blog\Infrastructure\Persistence\Eloquent;

use Src\Common\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
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
                ?   $this->post->query()->where('status', 2)->latest('id')->get()
                :   $this->post->query()->where('status', 2)->latest('id')->paginate($pages);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getPost(PostEntity $entity, mixed $post, array $columns): Post
    {
        try {
            return (is_int($post))
                ?   $this->post->query()->find($entity->id->getId())->first()
                :   $this->post->select($columns)->firstWhere('slug', $entity->slug->getSlug());
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getRelatedPosts(PostEntity $entity, array $columns): Collection
    {
        try {
            return $this->post
                ->select($columns)
                ->where('category_id', $entity->category_id->getId())
                ->where('status', $entity->status->getStatus())
                ->where('id', '!=', $entity->id->getId())
                ->latest('id')
                ->take(4)
                ->get();
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}
