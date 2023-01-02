<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;
use Src\Posts\Infrastructure\GetRelatedPosts;

class PostShowController extends Controller
{
    private $controller;

    public function __construct(GetPost $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke($post)
    {
        $post = $this->controller->getPost($post);
        $relatedPosts = (new GetRelatedPosts)->execute($post);

        $this->authorize('published', $post);

        return view('post.show', compact('post', 'relatedPosts'));
    }
}
