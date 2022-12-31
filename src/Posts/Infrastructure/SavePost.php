<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\SavePostUseCase;

class SavePost
{
    protected $savePost;

    public function __construct(SavePostUseCase $savePost)
    {
        $this->savePost = $savePost;
    }

    public function savePost(mixed $req, $url, int $id = null)
    {
        return $this->savePost->execute($req, $url, $id);
    }
}
