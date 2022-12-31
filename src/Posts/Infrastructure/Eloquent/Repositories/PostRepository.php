<?php

namespace Src\Posts\Infrastructure\Eloquent\Repositories;

use Illuminate\Support\Facades\Storage;
use Src\Posts\Domain\ValueObjects\PostId;
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
        if (!is_int($post)) {
            $slug = (new PostSlug($post))->value();
            return $this->model->firstWhere('slug', $slug);
        } else {
            $id = (new PostId($post))->value();
            return $this->model->find($id);
        }
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

    public function save(mixed $req, $url = null, int $id = null)
    {
        $objectId = (new PostId($id))->value();
        $objectModel = $this->model->find($objectId);

        if (is_null($objectModel)) {
            $post = $this->model->create([
                'title' => $req['title'],
                'slug' => $req['slug'],
                'extract' => $req['extract'],
                'body' => $req['body'],
                'status' => $req['status'],
                'category_id' => $req['category_id']
            ]);

            $this->saveImage($post, 'url', $url);
            $this->saveTags($post, $req);
        } else {
            $objectModel->update([
                'title' => $req['title'],
                'slug' => $req['slug'],
                'extract' => $req['extract'],
                'body' => $req['body'],
                'status' => $req['status'],
                'category_id' => $req['category_id']
            ]);

            $this->saveImage($objectModel, 'url', $url, true);
            $this->saveTags($objectModel, $req);
        }
    }

    public function deletePost(int $id)
    {
        $objectId = (new PostId($id))->value();
        $objectModel = $this->model->find($objectId);

        $objectModel->delete();
        $this->deleteImageRegistered($objectModel);
    }

    public function saveImage($postModel, string $table, string $url = null, bool $update = false)
    {
        if (!$url) {
            return;
        }
        if ($update) {
            if ($postModel->image) {
                Storage::delete($postModel->image->url);

                $postModel->image()->update([
                    $table => $url
                ]);
            } else {
                $postModel->image()->create([
                    $table => $url
                ]);
            }
        } else {
            $postModel->image()->create([
                $table => $url
            ]);
        }
    }

    public function deleteImageRegistered($postModel)
    {
        $postModel->image()->delete();
    }

    public function saveTags($postModel, $req)
    {
        $postModel->tags()->detach();
        $postModel->tags()->attach($req['tags']);
    }
}
