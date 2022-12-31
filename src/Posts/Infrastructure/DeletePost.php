<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\DeletePostUseCase;

class DeletePost
{
    protected $deletePost;

    public function __construct(DeletePostUseCase $deletePost)
    {
        $this->deletePost = $deletePost;
    }

    public function deletePost(int $id)
    {
        return $this->deletePost->execute($id);
    }
}
