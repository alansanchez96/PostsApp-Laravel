<?php

namespace App\Http\Controllers\Post;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;
use Src\Posts\Infrastructure\GetRelatedPosts;

class PostShowController extends Controller
{
    /**
     * controller GetPost
     *
     * @var PostModel
     */
    private $controller;

    /**
     * method construct
     *
     * @param GetPost $controller
     */
    public function __construct(GetPost $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Muestra información detallada del post model solicitado.
     * Obtiene y muestra los posts relacionados.
     * Y valida que los posts que se consulten estén en estado "2".
     *
     * @param mixed $post
     * @return View
     */
    public function __invoke(mixed $post): View
    {
        $post = $this->controller->getPost($post);
        $relatedPosts = (new GetRelatedPosts)->execute($post);
        $this->authorize('published', $post);

        return view('post.show', compact('post', 'relatedPosts'));
    }
}
