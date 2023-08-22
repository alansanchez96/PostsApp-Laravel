<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Category;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetCategoriesHandler;

class CategoryEditController extends Controller
{
    public function __construct(private readonly GetCategoriesHandler $category) { }

    /**
     * Obtiene el Model Category consultado y lo envia a la vista.
     *
     * @param mixed $slug
     * @return View
     */
    public function __invoke(mixed $category): View
    {
        $category = $this->category->getCategory($category);

        return view('admin.category.edit', compact('category'));
    }
}
