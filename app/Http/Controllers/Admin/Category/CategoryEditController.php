<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Src\Categories\Infrastructure\GetCategory;

class CategoryEditController extends Controller
{
    /**
     * controller property
     *
     * @var GetCategory
     */
    protected $controller;

    public function __construct(GetCategory $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Obtiene el Model Category consultado y lo envia a la vista.
     *
     * @param mixed $slug
     * @return View
     */
    public function edit(mixed $slug): View
    {
        $category = $this->controller->getCategory($slug);

        return view('admin.category.edit', compact('category'));
    }
}
