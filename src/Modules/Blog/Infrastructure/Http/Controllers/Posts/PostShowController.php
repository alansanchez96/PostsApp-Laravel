<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Posts;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetPostsHandler;

class PostShowController extends Controller
{
    public function __construct(private readonly GetPostsHandler $handler) { }

    /**
     * Retorna el Post Indicado
     *
     * @param mixed|int|string $post
     * @return View
     */
    public function __invoke(mixed $post)
    {
        $columns        = array('title', 'slug');

        $post           = $this->handler->getPost($post);

        $relatedPosts   = $this->handler->getRelatedPosts($post->toArray(), $columns);

        return view('post.show', [
            'post'          => $post,
            'relatedPosts'  => $relatedPosts,
        ]);
    }
}
