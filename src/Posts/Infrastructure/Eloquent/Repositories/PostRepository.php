<?php

namespace Src\Posts\Infrastructure\Eloquent\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Src\Posts\Domain\ValueObjects\PostId;
use Src\Posts\Domain\ValueObjects\PostSlug;
use Illuminate\Database\Eloquent\Collection;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Posts\Domain\Contracts\PostRepositoryContract;
use Illuminate\Support\Collection as SupportCollection;

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

    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return Collection|SupportCollection
     */
    public function getAllPosts(bool $pluck = false, string $column = null, mixed $key = null): Collection|SupportCollection
    {
        if (!$pluck) {
            return $this->model->all();
        } else {
            return $this->model->pluck($column, $key);
        }
    }

    /**
     * Retorna un paginador de todos los Posts Activos
     *
     * @param string $column
     * @param integer $pages
     * @return Paginator|Builder
     */
    public function getActivePosts(string $column, int $pages): Paginator|Builder
    {
        return $this->model->where('status', 2)->latest($column)->simplePaginate($pages);
    }

    /**
     * Obtiene el Model Post y devuelve el Model consultado
     *
     * @param mixed $post
     * @return Model|Collection|Builder
     */
    public function getPost(mixed $post): Model|Collection|Builder
    {
        if (!is_int($post)) {
            $slug = (new PostSlug($post))->value();
            return $this->model->firstWhere('slug', $slug);
        } else {
            $id = (new PostId($post))->value();
            return $this->model->find($id);
        }
    }

    /**
     * Obtiene el PostModel relacionado con CategoryModel
     *
     * @param mixed $post
     * @return Model|Builder|Collection
     */
    public function getRelatedPosts(mixed $post): Model|Builder|Collection
    {
        return $this->model->where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();
    }

    /**
     * Obtiene una paginacion del PostModel consultado relacionado a la categoria_id
     *
     * @param integer $id
     * @return Paginator
     */
    public function getCategoryPost(int $id): Paginator
    {
        return $this->model::where('category_id', $id)
            ->where('status', 2)
            ->latest('id')
            ->simplePaginate(6);
    }

    /**
     * Recibe el request y almacena los registros
     *
     * @param mixed $req
     * @param string $url
     * @param integer|null $id
     * @return void
     */
    public function save(mixed $req, ?string $url = null, int $id = null): void
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

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function deletePost(int $id): void
    {
        $objectId = (new PostId($id))->value();
        $objectModel = $this->model->find($objectId);

        $objectModel->delete();
        $this->deleteImageRegistered($objectModel);
    }

    /**
     * Guarda o actualiza la imagen del PostModel
     *
     * @param mixed $postModel
     * @param string $table
     * @param string|null $url
     * @param boolean $update
     * @return void
     */
    public function saveImage(mixed $postModel, string $table, string $url = null, bool $update = false): void
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

    /**
     * Elimina la imagen del PostModel
     *
     * @param mixed $postModel
     * @return void
     */
    public function deleteImageRegistered(mixed $postModel): void
    {
        $postModel->image()->delete();
    }

    /**
     * Guarda los tags recibidos por el Request
     *
     * @param mixed $postModel
     * @param mixed $req
     * @return void
     */
    public function saveTags(mixed $postModel, mixed $req): void
    {
        $postModel->tags()->detach();
        $postModel->tags()->attach($req['tags']);
    }
}
