<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\GetActivePostsUserCase;

class GetActivePosts
{
    private $getActivePosts;

    public function __construct(GetActivePostsUserCase $getActivePosts)
    {
        $this->getActivePosts = $getActivePosts;
    }

    public function execute($column, $pages)
    {
        return $this->getActivePosts->execute($column, $pages);
    }
}
