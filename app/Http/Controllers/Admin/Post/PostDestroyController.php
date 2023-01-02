<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;
use Src\Posts\Infrastructure\DeletePost;

class PostDestroyController extends Controller
{
    protected $controller;

    protected $controllerPost;

    public function __construct(DeletePost $controller, GetPost $controllerPost)
    {
        $this->controller = $controller;
        $this->controllerPost = $controllerPost;
    }

    public function destroy(int $id)
    {
        $post = $this->controllerPost->getPost($id);
        $this->authorize('author', $post);

        $this->controller->deletePost($id);

        return redirect()->route('admin.post.index')->with('delete', 'El post se ha eliminado con exito');
    }
}
