<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

class CategoryCreateController extends Controller
{
    /**
     * Retorna la vista para crear una categoria
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.category.create');
    }
}
