<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;
use Src\Posts\Infrastructure\SavePost;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;

class PostUpdateController extends Controller
{
    protected $controllerSavePost;

    protected $controllerGetPost;

    public function __construct(SavePost $controllerSavePost, GetPost $controllerGetPost)
    {
        $this->controllerSavePost = $controllerSavePost;
        $this->controllerGetPost = $controllerGetPost;
    }

    public function update(PostRequest $request, int $id)
    {
        $url = null;

        $post = $this->controllerGetPost->getPost($id);
        $this->authorize('author', $post);

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));
        }

        $this->controllerSavePost->savePost($request, $url, $id);

        return redirect()->route('admin.post.index')->with('update', 'El post fue actualizado con éxito');
    }
}
