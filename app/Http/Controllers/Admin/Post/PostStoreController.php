<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Posts\Infrastructure\SavePost;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostRequest;

class PostStoreController extends Controller
{
    /**
     * controller property
     *
     * @var SavePost
     */
    protected $controllerPost;

    public function __construct(SavePost $controllerPost)
    {
        $this->controllerPost = $controllerPost;
    }

    /**
     * Valida que el request se cumpla sus requisitos.
     * Crea el PostModel y sus relaciones.
     * Redirecciona a la ruta designada.
     *
     * @param PostRequest $request
     * @return Redirector|RedirectResponse
     */
    public function store(PostRequest $request): Redirector|RedirectResponse
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
