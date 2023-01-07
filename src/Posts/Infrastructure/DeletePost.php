<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\DeletePostUseCase;

class DeletePost
{
    /**
     * Use case DeletePost
     *
     * @var DeletePostUseCase
     */
    protected $deletePost;

    public function __construct(DeletePostUseCase $deletePost)
    {
        $this->deletePost = $deletePost;
    }

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function deletePost(int $id)
    {
        return $this->deletePost->execute($id);
    }
}
