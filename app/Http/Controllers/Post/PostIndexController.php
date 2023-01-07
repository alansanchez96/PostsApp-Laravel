<?php

namespace App\Http\Controllers\Post;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetActivePosts;


class PostIndexController extends Controller
{
    /**
     * controller GetActivePosts
     *
     * @var PostModel
     */
    private $controller;

    /**
     * method construct
     *
     * @param GetActivePosts $getActivePosts
     */
    public function __construct(GetActivePosts $getActivePosts)
    {
        $this->controller = $getActivePosts;
    }

    /**
     * Muestra la vista principal de todos los posts activos, ordenados por ID y paginado.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $posts = $this->controller->execute('id', 10);

        return view('post.index', compact('posts'));
    }
}
