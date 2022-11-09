<?php

namespace Src\Posts\Infrastructure;

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
        $posts = $this->controller->execute();
        /* $showActivePosts = new ShowActivePosts(new PostModel);

        $posts = $showActivePosts->execute(); */

        /* $posts = PostModel::where('status', 1)->latest('id')->paginate(2); */

        return view('post.index', compact('posts'));
    }
}
