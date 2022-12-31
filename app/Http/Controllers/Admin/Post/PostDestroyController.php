<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\DeletePost;

class PostDestroyController extends Controller
{
    protected $controller;

    public function __construct(DeletePost $controller)
    {
        $this->controller = $controller;
    }

    public function destroy(int $id)
    {
        $this->controller->deletePost($id);

        return redirect()->route('admin.post.index')->with('delete', 'El post se ha eliminado con exito');
    }
}
