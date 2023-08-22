<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetPostsHandler;

class IndexController extends Controller
{
    public function __construct(private readonly GetPostsHandler $handler) { }

    public function __invoke(): View
    {
        $posts = $this->handler->getActivePosts(10);

        return view('post.index', [
            'posts' => $posts
        ]);
    }
}
