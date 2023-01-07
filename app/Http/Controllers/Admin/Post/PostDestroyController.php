<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Posts\Infrastructure\GetPost;
use Src\Posts\Infrastructure\DeletePost;

class PostDestroyController extends Controller
{
    /**
     * controller property
     *
     * @var DeletePost
     */
    protected $controller;

    /**
     * controller property
     *
     * @var GetPost
     */
    protected $controllerPost;

    /**
     * method construct
     *
     * @param DeletePost $controller
     * @param GetPost $controllerPost
     */
    public function __construct(DeletePost $controller, GetPost $controllerPost)
    {
        $this->controller = $controller;
        $this->controllerPost = $controllerPost;
    }

    /**
     * Obtiene el ModelPost y elimina su registro
     *
     * @param integer $id
     * @return Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse
    {
        $post = $this->controllerPost->getPost($id);
        $this->authorize('author', $post);

        $this->controller->deletePost($id);

        return redirect()->route('admin.post.index')->with('delete', 'El post se ha eliminado con exito');
    }
}
