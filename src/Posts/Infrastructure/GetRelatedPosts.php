<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\GetRelatedPostsUseCase;

class GetRelatedPosts
{
    private $getRelatedPosts;

    public function __construct()
    {
        $this->getRelatedPosts = new GetRelatedPostsUseCase;
    }

    public function execute($post)
    {
        return $this->getRelatedPosts->execute($post);
    }
}
