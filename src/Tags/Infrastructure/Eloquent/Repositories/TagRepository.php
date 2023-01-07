<?php

namespace Src\Tags\Infrastructure\Eloquent\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Src\Tags\Domain\ValueObjects\TagId;
use Illuminate\Database\Eloquent\Builder;
use Src\Tags\Domain\ValueObjects\TagSlug;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Domain\Contract\TagRepositoryContract;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class TagRepository implements TagRepositoryContract
{
    /**
     * TagModel property
     *
     * @var TagModel
     */
    private TagModel $model;

    public function __construct()
    {
        $this->model = new TagModel();
    }

    /**
     * Obtiene un paginador con los Posts relacionados al TagModel recibido
     *
     * @param TagModel $tag
     * @return Paginator
     */
    public function getPostsRelatedToTags(TagModel $tag): Paginator
    {
        $objectModel = $this->model->findOrFail($tag->id);

        return $objectModel->posts()->where('status', 2)->latest('id')->simplePaginate(6);
    }

    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return EloquentCollection|Collection
     */
    public function getAllTags(bool $pluck = false, string $column = null, mixed $key = null): EloquentCollection|Collection
    {
        if (!$pluck) {
            return $this->model->all();
        } else {
            return $this->model->pluck($column, $key);
        }
    }

    /**
     * Obtiene el Model Tag y devuelve el Model consultado
     *
     * @param mixed $tag
     * @return Model|EloquentCollection|Builder
     */
    public function getTag(mixed $tag): Model|EloquentCollection|Builder
    {
        if (!is_int($tag)) {
            $slug = (new TagSlug($tag))->value();
            return $this->model->firstWhere('slug', $slug);
        } else {
            $id = (new TagId($tag))->value();
            return $this->model->find($id);
        }
    }


    /**
     * Recibe el request por separado y almacena los registros
     *
     * @param mixed $reqName
     * @param mixed $reqSlug
     * @param mixed $reqColor
     * @param integer|null $id
     * @return void
     */
    public function save(mixed $reqName, mixed $reqSlug, mixed $reqColor, ?int $id = null): void
    {
        $objectId = (new TagId($id))->value();
        $objectModel = $this->model->find($objectId);

        if (is_null($objectModel)) {
            $this->model->create([
                'name' => $reqName,
                'slug' => $reqSlug,
                'color' => $reqColor,
            ]);
        } else {
            $objectModel->update([
                'name' => $reqName,
                'slug' => $reqSlug,
                'color' => $reqColor,
            ]);
        }
    }

    /**
     * Obtiene el ModelTag y elimina su registro
     *
     * @param integer $id
     * @return void
     */
    public function deleteTag(int $id): void
    {
        $objectId = (new TagId($id))->value();
        $objectModel = $this->model->find($objectId);

        $objectModel->delete();
    }
}
