<?php

namespace Src\Posts\Domain\Contracts;

interface PostRepositoryContract
{
    public function getAllPosts();

    public function getActivePosts($column, $pages);
}
