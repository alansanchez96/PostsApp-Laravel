<?php

namespace Src\Posts\Application;

use Src\Posts\Infrastructure\Eloquent\PostModel;

class ShowPosts
{
    private $entity;

    public function __construct(PostModel $entity)
    {
        $this->entity = $entity;
    }

    public function execute()
    {
        return $this->entity::all();
    }
}
