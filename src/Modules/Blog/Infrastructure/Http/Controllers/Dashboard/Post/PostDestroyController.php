<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Post;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\DeletePostCommand;

class PostDestroyController extends Controller
{
    public function __construct(private readonly DeletePostCommand $command) { }

    /**
     * Obtiene el Post y elimina su registro
     *
     * @param mixed $post
     * @return Redirector|RedirectResponse
     */
    public function __invoke(mixed $post): Redirector|RedirectResponse
    {
        $data = ['id' => !is_int($post) ? (int) $post : (string) $post];

        $this->command->deletePost($data);

        return redirect()->route('admin.post.index')->with('delete', 'El post se ha eliminado con exito');
    }
}
