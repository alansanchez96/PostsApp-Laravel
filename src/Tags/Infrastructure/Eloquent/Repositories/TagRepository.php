<?php

namespace Src\Tags\Infrastructure\Eloquent\Repositories;

use Src\Tags\Domain\ValueObjects\TagId;
use Src\Tags\Domain\ValueObjects\TagSlug;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Domain\Contract\TagRepositoryContract;

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

    public function getPostsRelatedToTags(TagModel $tag)
    {
        $objectModel = $this->model->findOrFail($tag->id);

        return $objectModel->posts()->where('status', 2)->latest('id')->simplePaginate(6);
    }

    public function getAllTags()
    {
        return $this->model->all();
    }

    public function getTag($slug)
    {
        $slug = (new TagSlug($slug))->value();
        $objectModel = $this->model->firstWhere('slug', $slug);
        $id = (new TagId($objectModel->id))->value();

        return $this->model->findOrFail($id);
    }

    public function save($reqName, $reqSlug, $reqColor, int $id = null)
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

    public function deleteTag(int $id)
    {
        $objectId = (new TagId($id))->value();
        $objectModel = $this->model->find($objectId);

        $objectModel->delete();
    }
}
