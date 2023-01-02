<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Src\Categories\Infrastructure\SaveCategory;

class CategoryStoreController extends Controller
{
    protected $controller;

    public function __construct(SaveCategory $controller)
    {
        $this->controller = $controller;
    }


    public function store(CategoryRequest $request)
    {
        $this->controller->saveCategory($request);

        return redirect()->route('admin.category.index')->with('create', 'La categoria se creó con éxito.');
    }
}
