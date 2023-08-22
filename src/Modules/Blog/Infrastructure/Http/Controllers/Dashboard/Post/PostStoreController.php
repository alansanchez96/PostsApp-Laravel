<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Post;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\SavePostCommand;
use Src\Modules\Blog\Infrastructure\Http\Requests\PostRequest;

class PostStoreController extends Controller
{
    public function __construct(private readonly SavePostCommand $command) { }

    /**
     * Valida que el request se cumpla sus requisitos.
     * Crea el PostModel y sus relaciones.
     * Redirecciona a la ruta designada.
     *
     * @param PostRequest $request
     * @return Redirector|RedirectResponse
     */
    public function __invoke(PostRequest $request): Redirector|RedirectResponse
    {
        $data = [
            'title'         =>  $request->title,
            'extract'       =>  $request->extract,
            'body'          =>  $request->body,
            'status'        =>  $request->status,
            'category_id'   =>  $request->category_id,
            'user_id'       =>  $request->user_id,
            'file'          =>  $request->file('file'),
            'tags'          =>  $request->tags
        ];

        $this->command->execute($data);

        return redirect()->route('admin.post.index')->with('create', 'El post se creó con éxito.');
    }
}
