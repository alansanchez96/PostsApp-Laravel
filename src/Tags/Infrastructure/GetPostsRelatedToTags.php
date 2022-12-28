<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Application\GetPostsRelatedToTagsUseCase;

class GetPostsRelatedToTags
{
    private $getPostsRelatedToTags;

    public function __construct(GetPostsRelatedToTagsUseCase $getPostsRelatedToTags)
    {
        $this->getPostsRelatedToTags = $getPostsRelatedToTags;
    }

    public function execute(TagModel $tag)
    {
        return $this->getPostsRelatedToTags->execute($tag);
    }
}
