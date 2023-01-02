<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\SavePost;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;

class PostStoreController extends Controller
{
    protected $controllerPost;

    public function __construct(SavePost $controllerPost)
    {
        $this->controllerPost = $controllerPost;
    }

    public function store(PostRequest $request)
    {
        $url = null;

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
        }

        $this->controllerPost->savePost(
            $request->only([
                'title',
                'slug',
                'extract',
                'body',
                'status',
                'category_id',
                'user_id',
                'tags',
            ]),
            $url
        );

        return redirect()->route('admin.post.index')->with('create', 'El post se creó con éxito.');
    }
}
