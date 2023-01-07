<?php

namespace App\Http\Controllers\Admin\Tag;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\SaveTag;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\TagRequest;

class TagStoreController extends Controller
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
     * Crea un nuevo registro de TagModel y lo almacena
     * Redirecciona a la ruta designada.
     *
     * @param TagRequest $request
     * @return Redirector|RedirectResponse
     */
    public function store(TagRequest $request): Redirector|RedirectResponse
    {
        $this->controller->saveTag($request);

        return redirect()->route('admin.tag.index')->with('create', 'La etiqueta se creó con éxito');
    }
}
