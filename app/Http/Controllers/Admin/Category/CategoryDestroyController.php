<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Src\Categories\Infrastructure\DeleteCategory;

class CategoryDestroyController extends Controller
{
    protected $controller;

    public function __construct(DeleteCategory $controller)
    {
        $this->controller = $controller;
    }

    public function destroy(int $id)
    {
        $this->controller->deleteCategory($id);

        return redirect()->route('admin.category.index')->with('delete', 'La categoria se ha eliminado');
    }
}
