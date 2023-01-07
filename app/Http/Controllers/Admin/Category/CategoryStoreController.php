<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;
use Src\Categories\Infrastructure\SaveCategory;

class CategoryStoreController extends Controller
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
     * Guarda el registro de la nueva categoria.
     * Redirecciona a la ruta indicada.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CategoryRequest $request): RedirectResponse|Redirector
    {
        $this->controller->saveCategory($request);
        return redirect()->route('admin.category.index')->with('create', 'La categoria se creó con éxito.');
    }
}
