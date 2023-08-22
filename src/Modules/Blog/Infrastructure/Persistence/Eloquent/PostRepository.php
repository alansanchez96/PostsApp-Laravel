<?php

namespace Src\Modules\Blog\Infrastructure\Persistence\Eloquent;

use Src\Common\BaseRepository;
use Src\Common\Services\ImageService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Src\Common\Interfaces\Laravel\EloquentModel;
use Src\Modules\Blog\Domain\Entities\PostEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Post;
use Src\Modules\Blog\Domain\Contracts\IPostRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostRepository extends BaseRepository implements IPostRepository
{
    public function __construct(private readonly Post $post, private readonly ImageService $imageService) { }

    public function getActivePosts(int $pages = null): Collection|LengthAwarePaginator
    {
        try {
            $query = $this->post->query();

            return is_null($pages)
                ?   $query->where('status', $this->post::ACTIVE)->latest('id')->get()
                :   $query->where('status', $this->post::ACTIVE)->latest('id')->paginate($pages);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getPost(array $data, array $columns = null): ?Post
    {
        $entity = new PostEntity($data);

        try {
            $query = $this->post->query();

            if (!is_null($columns)) $query->select($columns);

            return !is_null($entity->id->getId())
                ?   $query->findOrFail($entity->id->getId())
                :   $query->where('slug', $entity->slug->getSlug())->firstOrFail();

        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    public function getRelatedPosts(array $data, array $columns = null): ?Collection
    {
        $entity = new PostEntity($data);

        try {
            $query = $this->post->query();

            if (!is_null($columns)) $query->select($columns);

            return $query->where('category_id', $entity->category_id->getId())
                ->where('status', $this->post::ACTIVE)
                ->where('id', '!=', $entity->id->getId())
                ->latest('id')
                ->take(4)
                ->get();
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getPostsBy(EloquentModel $model, array $relationship, array $columns = null, int $pages = null): Collection|LengthAwarePaginator
    {
        try {
            $query = $this->post
                ->whereHas($relationship['type'], fn ($query) => $query->where($relationship['key'], $model->id))
                ->where('status', $this->post::ACTIVE)
                ->latest('id');

            if (!is_null($columns)) $query->select($columns);

            return is_null($pages)
                ?   $query->get()
                :   $query->paginate($pages);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    public function save(array $data, bool $update = false): void
    {
        !$update ? $this->create($data) : $this->update($data);
    }

    private function create(array $data): void
    {
        $entity = new PostEntity($data);

        try {
            $post = $this->post->create([
                'title'         =>  $entity->title->getTitle(),
                'slug'          =>  $this->toSlug($entity->title->getTitle()),
                'extract'       =>  $entity->extract->getExtract(),
                'body'          =>  $entity->body->getBody(),
                'status'        =>  $entity->status->getStatus(),
                'category_id'   =>  $entity->category_id->getId(),
                'user_id'       =>  $entity->user_id->getId()
            ]);

            if ($data['file'])
                $this->imageService->save($post, 'posts', $data['file']);

            $this->saveTags($post, $entity->tags->getTags());
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    private function update(array $data): void
    {
        $entity = new PostEntity($data);

        try {
            $post = $this->post->findOrFail($entity->id->getId());

            $post->update([
                'title'         =>  $entity->title->getTitle(),
                'slug'          =>  $this->toSlug($entity->title->getTitle()),
                'extract'       =>  $entity->extract->getExtract(),
                'body'          =>  $entity->body->getBody(),
                'status'        =>  $entity->status->getStatus(),
                'category_id'   =>  $entity->category_id->getId(),
            ]);

            if ($data['file'])
                $this->imageService->save($post, 'posts', $data['file']);

            $this->saveTags($post, $entity->tags->getTags());
        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    public function delete(array $data): void
    {
        $entity = new PostEntity($data);

        try {
            $this->post->query()->findOrFail($entity->id->getId())->delete();
        } catch (ModelNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    private function saveTags(Post $post, array $tags): void
    {
        $post->tags()->detach();

        $post->tags()->attach($tags);
    }
}
