<?php

namespace Src\Posts\Infrastructure;

use Src\Posts\Application\ShowActivePosts;
use Src\Posts\Domain\EloquentRepository\PostEntity;

class RegisteredPosts
{
    public static function getActivePosts()
    {
        $posts = new ShowActivePosts(new PostEntity);

        return $posts->execute();
    }
}
