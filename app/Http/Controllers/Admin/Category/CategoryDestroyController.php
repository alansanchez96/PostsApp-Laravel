<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Src\Categories\Infrastructure\DeleteCategory;

class CategoryDestroyController extends Controller
{
    /**
     * controller property
     *
     * @var DeleteCategory
     */
    protected $controller;

    public function __construct(DeleteCategory $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Elimina el registro del Model Category consultado
     *
     * @param integer $id
     * @return RedirectResponse|Redirector
     */
    public function destroy(int $id): RedirectResponse|Redirector
    {
        $this->controller->deleteCategory($id);

        return redirect()->route('admin.category.index')->with('delete', 'La categoria se ha eliminado');
    }
}
