<?php

namespace Src\Posts\Domain\Contracts;

use Src\Posts\Application\GetRelatedPostsUseCase;

interface PostRepositoryContract
{
    public function getAllPosts();

    public function getActivePosts($column, $pages);

    public function getPost($post);

    public function getRelatedPosts(GetRelatedPostsUseCase $post);

    public function getCategoryPost(int $id);

    public function save(mixed $req, $url, int $id = null);

    public function deletePost(int $id);
}
