<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Category;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Infrastructure\Persistence\Category;

class CategoryIndexController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }
}
