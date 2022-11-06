<?php

namespace Src\Posts\Application;

use Src\Posts\Domain\EloquentRepository\PostEntity;

class ShowPosts
{
    private $entity;

    public function __construct(PostEntity $entity)
    {
        $this->entity = $entity;
    }

    public function execute()
    {
        return $this->entity::all();
    }
}
