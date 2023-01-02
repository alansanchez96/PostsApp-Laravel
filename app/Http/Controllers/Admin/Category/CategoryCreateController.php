<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;

class CategoryCreateController extends Controller
{

    public function create()
    {
        return view('admin.category.create');
    }
}
