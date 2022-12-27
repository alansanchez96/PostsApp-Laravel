<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Application\GetPostsRelatedToTagsUseCase;

class GetPostsRelatedToTags
{
    private $getPostsRelatedToTags;

    public function __construct(GetPostsRelatedToTagsUseCase $getPostsRelatedToTags)
    {
        $this->getPostsRelatedToTags = $getPostsRelatedToTags;
    }

    public function execute($tag)
    {
        return $this->getPostsRelatedToTags->execute($tag);
    }
}
