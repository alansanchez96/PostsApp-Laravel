<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\GetActivePostsUseCase;

class GetActivePosts
{
    private $getActivePosts;

    public function __construct(GetActivePostsUseCase $getActivePosts)
    {
        $this->getActivePosts = $getActivePosts;
    }

    public function execute($column, $pages)
    {
        return $this->getActivePosts->execute($column, $pages);
    }
}
