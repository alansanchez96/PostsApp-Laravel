<?php
namespace Src\Tags\Infrastructure\Eloquent\Repositories;

use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Domain\Contract\TagRepositoryContract;

class TagRepository implements TagRepositoryContract
{
    /**
     * PostModel property
     *
     * @var PostModel
     */
    private TagModel $model;

    public function __construct()
    {
        $this->model = new TagModel();
    }

    public function getPostsRelatedToTags($tag)
    {
        return 'hola';
    }
}
