<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Category;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;

class CategoryCreateController extends Controller
{
    /**
     * Retorna la vista para crear una categoria
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('admin.category.create');
    }
}
