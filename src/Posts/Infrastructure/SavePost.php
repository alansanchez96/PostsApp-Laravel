<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\SavePostUseCase;

class SavePost
{
    /**
     * Use case SavePost
     *
     * @var SavePostUseCase
     */
    protected $savePost;

    public function __construct(SavePostUseCase $savePost)
    {
        $this->savePost = $savePost;
    }

    /**
     * Recibe el request y almacena los registros
     *
     * @param mixed $req
     * @param string $url
     * @param integer|null $id
     * @return void
     */
    public function savePost(mixed $req, ?string $url, int $id = null)
    {
        return $this->savePost->execute($req, $url, $id);
    }
}
