<?php

namespace Src\Modules\Blog\Application\Queries;

use Src\Common\Exceptions\EntityNotFoundException;
use Src\Common\UseCases;
use Src\Modules\Blog\Domain\Entities\PostEntity;
use Src\Modules\Blog\Infrastructure\Persistence\Post;
use Src\Modules\Blog\Domain\Contracts\IPostRepository;

class GetPostsHandler extends UseCases
{
    public function __construct(private readonly IPostRepository $repository) { }

    public function getActivePosts(int $pages = null)
    {
        try {
            $posts = $this->repository->getActivePosts($pages);

            return !is_null($posts)
                ?   $posts
                :   $this->entityNotfound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getPost(mixed $post)
    {
        $columns = [
            'id',
            'title',
            'body',
            'extract',
            'category_id',
            'status'
        ];

        $data = ['slug' => $post];

        if (ctype_digit($post))
            $data = ['id' => (int) $post];

        try {
            $post = $this->repository->getPost(
                new PostEntity($data),
                $data[key($data)],
                $columns
            );

            return !is_null($post)
                ?   $post
                :   $this->entityNotfound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage());
        }
    }

    public function getRelatedPosts(Post $post)
    {
        $columns = [
            'title',
            'slug'
        ];
        try {
            $relatedPosts = $this->repository->getRelatedPosts(
                new PostEntity([
                    'status' => (int) $post->status,
                    'category_id' => $post->category_id,
                    'id' => $post->id
                ]),
                $columns
            );

            return !is_null($relatedPosts)
                ?   $relatedPosts
                :   $this->entityNotfound();
        } catch (EntityNotFoundException $e) {
            $this->catch($e->getMessage());
        }
    }

    private function entityNotfound()
    {
        throw new EntityNotFoundException('Entidad no encontrada');
    }
}
