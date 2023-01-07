<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Posts\Infrastructure\GetPost;
use Src\Posts\Infrastructure\SavePost;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;

class PostUpdateController extends Controller
{
    /**
     * controller property
     *
     * @var SavePost
     */
    protected $controllerSavePost;

    /**
     * controller property
     *
     * @var GetPost
     */
    protected $controllerGetPost;

    /**
     * method construct
     *
     * @param SavePost $controllerSavePost
     * @param GetPost $controllerGetPost
     */
    public function __construct(SavePost $controllerSavePost, GetPost $controllerGetPost)
    {
        $this->controllerSavePost = $controllerSavePost;
        $this->controllerGetPost = $controllerGetPost;
    }

    /**
     * Valida que el request cumpla con sus requisitos.
     * Actualiza el registro almacenado.
     * Redirecciona a la ruta designada.
     *
     * @param PostRequest $request
     * @param integer $id
     * @return Redirector|RedirectResponse
     */
    public function update(PostRequest $request, int $id): Redirector|RedirectResponse
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
