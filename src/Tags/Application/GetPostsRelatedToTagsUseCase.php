<?php

namespace Src\Tags\Application;

use Src\Tags\Domain\Contract\TagRepositoryContract;


class GetPostsRelatedToTagsUseCase
{
    private $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute($tag)
    {
        return $this->repository->getPostsRelatedToTags($tag);
    }
}
