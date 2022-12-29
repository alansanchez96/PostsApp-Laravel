<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Src\Categories\Application\GetAllCategoriesUseCase;
use Src\Categories\Infrastructure\Eloquent\Repositories\CategoryRepository;

class CategoryIndexController extends Controller
{
    public function index()
    {
        $categories = (new GetAllCategoriesUseCase(new CategoryRepository))->execute();
        
        return view('admin.category.index', compact('categories'));
    }
}
