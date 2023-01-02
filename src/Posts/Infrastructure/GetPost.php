<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\GetPostUseCase;
use Src\Posts\Application\GetCategoryPostUseCase;

class GetPost
{
    private $getPost;
    private $getCategoryPost;

    public function __construct(GetPostUseCase $getPost, GetCategoryPostUseCase $getCategoryPost)
    {
        $this->getPost = $getPost;
        $this->getCategoryPost = $getCategoryPost;
    }

    public function getPost($post)
    {
        return $this->getPost->execute($post);
    }

    public function getCategoryPost(int $id)
    {
        return $this->getCategoryPost->execute($id);
    }
}
