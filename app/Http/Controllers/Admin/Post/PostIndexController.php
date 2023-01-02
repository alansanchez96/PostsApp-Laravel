<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;

class PostIndexController extends Controller
{
    public function index()
    {
        return view('admin.post.index');
    }
}
