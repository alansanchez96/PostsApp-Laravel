<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;
use Src\Categories\Infrastructure\SaveCategory;

class CategoryUpdateController extends Controller
{
    /**
     * controller property
     *
     * @var SaveCategory
     */
    protected $controller;

    public function __construct(SaveCategory $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Valida que el request cumpla las condiciones.
     * Guarda el nuevo registro de la categoria.
     * Redirecciona a la ruta indicada.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function update(CategoryRequest $request, int $id): RedirectResponse|Redirector
    {
        $this->controller->saveCategory($request, $id);

        return redirect()->route('admin.category.index')->with('update', 'La categoria se actualizó con éxito');
    }
}
