<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;

class ShowController extends Controller
{
    private $controller;

    public function __construct(GetPost $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke($post)
    {
        $post = $this->controller->getPost($post);

        return $post;
    }
}
