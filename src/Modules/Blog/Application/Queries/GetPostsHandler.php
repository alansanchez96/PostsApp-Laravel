<?php

namespace Src\Modules\Blog\Application\Queries;

use Src\Common\UseCases;
use Src\Common\Exceptions\EntityNotFoundException;
use Src\Modules\Blog\Domain\Contracts\IPostRepository;

class GetPostsHandler extends UseCases
{
    public function __construct(private readonly IPostRepository $repository) { }

    public function getActivePosts(int $pages = null)
    {
        try {
            $posts = $this->repository->getActivePosts($pages);

            return ! is_null($posts)
                ?   $posts
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    public function getPost(mixed $post, array $columns = null)
    {
        $data = ['slug' => $post];

        if (ctype_digit($post))
            $data = ['id' => (int) $post];
    
        try {
            $post = $this->repository->getPost($data, $columns);

            return ! is_null($post)
                ?   $post
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }

    public function getRelatedPosts(array $post, array $columns = null)
    {
        try {
            $relatedPosts = $this->repository->getRelatedPosts($post, $columns);

            return ! is_null($relatedPosts)
                ?   $relatedPosts
                :   $this->entityNotFound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage(), true);
        }
    }
}
