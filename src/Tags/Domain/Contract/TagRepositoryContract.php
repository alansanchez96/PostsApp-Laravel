<?php

namespace Src\Tags\Domain\Contract;

use Src\Tags\Infrastructure\Eloquent\TagModel;

interface TagRepositoryContract
{
    public function getPostsRelatedToTags(TagModel $tag);
}
