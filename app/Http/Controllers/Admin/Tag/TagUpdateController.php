<?php

namespace App\Http\Controllers\Admin\Tag;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\SaveTag;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\TagRequest;

class TagUpdateController extends Controller
{
    /**
     * controller property
     *
     * @var SaveTag
     */
    protected $controller;

    public function __construct(SaveTag $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Valida los requisitos del Request.
     * Actualiza el registro del TagModel almacenado.
     * Redirecciona a la ruta designada.
     *
     * @param TagRequest $request
     * @param integer $id
     * @return Redirector|RedirectResponse
     */
    public function update(TagRequest $request, int $id): Redirector|RedirectResponse
    {
        $this->controller->saveTag($request, $id);

        return redirect()->route('admin.tag.index')->with('update', 'La etiqueta se actualizó con éxito');
    }
}
