<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Tag;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\DeleteTagCommand;

class TagDestroyController extends Controller
{
    public function __construct(private readonly DeleteTagCommand $command) { }

    /**
     * Obtiene el TagModel y elimina su registro.
     * Redirecciona a la ruta designada.
     *
     * @param integer $id
     * @return Redirector|RedirectResponse
     */
    public function __invoke(int $tag): Redirector|RedirectResponse
    {
        $data = ['id' => !is_int($tag) ? (int) $tag : (string) $tag];

        $this->command->deleteTag($data);

        return redirect()->route('admin.tag.index')->with('delete', 'La etiqueta se ha eliminado');
    }
}
