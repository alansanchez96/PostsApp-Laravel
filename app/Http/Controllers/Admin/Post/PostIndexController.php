<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class PostIndexController extends Controller
{
    /**
     * Devuelve la vista principal con todos los post
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.post.index');
    }
}
