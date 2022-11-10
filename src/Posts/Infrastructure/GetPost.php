<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\GetPostUseCase;

class GetPost
{
    private $getPost;

    public function __construct(GetPostUseCase $getPost)
    {
        $this->getPost = $getPost;
    }

    public function getPost($post)
    {
        return $this->getPost->execute($post);
    }
}
