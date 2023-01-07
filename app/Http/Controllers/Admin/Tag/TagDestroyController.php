<?php

namespace App\Http\Controllers\Admin\Tag;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Tags\Infrastructure\DeleteTag;

class TagDestroyController extends Controller
{
    /**
     * controller property
     *
     * @var DeleteTag
     */
    protected $controller;

    public function __construct(DeleteTag $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Obtiene el TagModel y elimina su registro.
     * Redirecciona a la ruta designada.
     *
     * @param integer $id
     * @return Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse
    {
        $this->controller->deleteTag($id);

        return redirect()->route('admin.tag.index')->with('delete', 'La etiqueta se ha eliminado');
    }
}
