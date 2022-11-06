<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Src\Posts\Infrastructure\RegisteredPosts;

class PostController extends Controller
{
    public function index()
    {
        // Buscar los posts activos 
        /* $posts = RegisteredPosts::getActivePosts(); */

        $posts = Post::where('status', 1)->get();

        return view('post.index', compact('posts'));
    }
}
