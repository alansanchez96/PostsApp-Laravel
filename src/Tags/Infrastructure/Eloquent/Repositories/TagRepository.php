<?php
namespace Src\Tags\Infrastructure\Eloquent\Repositories;

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
}
