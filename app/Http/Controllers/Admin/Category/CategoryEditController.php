<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Src\Categories\Infrastructure\GetCategory;

class CategoryEditController extends Controller
{
    protected $controller;

    public function __construct(GetCategory $controller)
    {
        $this->controller = $controller;
    }

    public function edit($slug)
    {
        $category = $this->controller->getCategory($slug);

        return view('admin.category.edit', compact('category'));
    }
}
