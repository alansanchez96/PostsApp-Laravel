<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Categories\Application\GetAllCategoriesUseCase;
use Src\Categories\Infrastructure\Eloquent\Repositories\CategoryRepository;

class CategoryIndexController extends Controller
{
    /**
     * Obtiene una colecion de todas las categorias a la vista.
     * Retorna la vista.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = (new GetAllCategoriesUseCase(new CategoryRepository))->execute();

        return view('admin.category.index', compact('categories'));
    }
}
