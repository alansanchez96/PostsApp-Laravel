<?php

namespace Src\Tags\Domain\Contract;

interface TagRepositoryContract
{
    public function getPostsRelatedToTags($tag);
}
