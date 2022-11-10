<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetActivePosts;


class IndexController extends Controller
{
    private $controller;

    public function __construct(GetActivePosts $getActivePosts)
    {
        $this->controller = $getActivePosts;
    }
    public function __invoke()
    {
        $posts = $this->controller->execute('id', 10);

        return view('post.index', compact('posts'));
    }
}
