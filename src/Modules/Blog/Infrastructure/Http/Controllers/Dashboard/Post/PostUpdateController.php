<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Post;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\UpdatePostCommand;
use Src\Modules\Blog\Infrastructure\Http\Requests\PostRequest;

class PostUpdateController extends Controller
{
    public function __construct(private readonly UpdatePostCommand $command) { }

    /**
     * Valida que el request cumpla con sus requisitos.
     * Actualiza el registro almacenado.
     * Redirecciona a la ruta designada.
     *
     * @param PostRequest $request
     * @param integer $post
     * @return Redirector|RedirectResponse
     */
    public function __invoke(PostRequest $request, int $post): Redirector|RedirectResponse
    {
        $data = [
            'id'            =>  !is_int($post) ? (int) $post : (string) $post,
            'title'         =>  $request->title,
            'extract'       =>  $request->extract,
            'body'          =>  $request->body,
            'status'        =>  $request->status,
            'category_id'   =>  $request->category_id,
            'file'          =>  $request->file('file'),
            'tags'          =>  $request->tags
        ];

        $this->command->execute($data);

        return redirect()->route('admin.post.index')->with('update', 'El post fue actualizado con éxito');
    }
}
