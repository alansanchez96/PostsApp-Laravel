<?php

namespace Src\Tags\Application;

use Src\Tags\Domain\Contract\TagRepositoryContract;
use Src\Tags\Infrastructure\Eloquent\TagModel;

class GetPostsRelatedToTagsUseCase
{
    private $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(TagModel $tag)
    {
        return $this->repository->getPostsRelatedToTags($tag);
    }
}
