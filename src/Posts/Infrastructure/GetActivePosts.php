<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\GetActivePostsUserCase;

class GetActivePosts
{
    private $getAllPosts;

    public function __construct(GetActivePostsUserCase $getAllPosts)
    {
        $this->getAllPosts = $getAllPosts;
    }

    public function execute()
    {
        return $this->getAllPosts->execute();
    }
}
