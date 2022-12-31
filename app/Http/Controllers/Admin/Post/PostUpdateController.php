<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\SavePost;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;
use Src\Posts\Infrastructure\GetPost;

class PostUpdateController extends Controller
{
    protected $controllerSavePost;

    public function __construct(SavePost $controllerSavePost)
    {
        $this->controllerSavePost = $controllerSavePost;
    }

    public function update(PostRequest $request, int $id)
    {
        $url = null;

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
        }

        $this->controllerSavePost->savePost($request, $url, $id);

        return redirect()->route('admin.post.index')->with('update', 'El post fue actualizado con éxito');
    }
}
