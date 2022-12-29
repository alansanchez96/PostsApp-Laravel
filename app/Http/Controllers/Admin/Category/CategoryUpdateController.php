<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Src\Categories\Infrastructure\SaveCategory;

class CategoryUpdateController extends Controller
{
    protected $controller;

    public function __construct(SaveCategory $controller)
    {
        $this->controller = $controller;
    }


    public function update(CategoryRequest $request, $id)
    {
        $this->controller->saveCategory($request, $id);

        return redirect()->route('admin.category.index')->with('update', 'La categoria se actualizó con éxito');
    }
}
