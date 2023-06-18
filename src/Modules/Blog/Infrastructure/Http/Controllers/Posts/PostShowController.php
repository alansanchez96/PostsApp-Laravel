<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Posts;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetPostsHandler;

class PostShowController extends Controller
{
    public function __construct(private readonly GetPostsHandler $handler)
    {
    }

    /**
     * Retorna el Post Indicado
     *
     * @param mixed|int|string $slug
     * @return View
     */
    public function __invoke(mixed $post): View
    {
        $post = $this->handler->getPost($post);

        $relatedPost = $this->handler->getRelatedPosts($post);

        return view('post.show', [
            'post' => $post,
            'relatedPost' => $relatedPost,
        ]);
    }
}
