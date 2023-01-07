<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\GetAllTags;
use Src\Categories\Infrastructure\GetAllCategories;

class PostCreateController extends Controller
{
    /**
     * controller property
     *
     * @var GetAllCategories
     */
    protected $controllerCategory;

    /**
     * controller property
     *
     * @var GetAllTags
     */
    protected $controllerTags;

    /**
     * method construct
     *
     * @param GetAllCategories $controllerCategory
     * @param GetAllTags $controllerTags
     */
    public function __construct(GetAllCategories $controllerCategory, GetAllTags $controllerTags)
    {
        $this->controllerCategory = $controllerCategory;
        $this->controllerTags = $controllerTags;
    }

    /**
     * Obtiene la coleccion de CategoryModel y TagModel pasandolos a la vista.
     * Devuelve la vista para crear un PostModel.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = $this->controllerCategory->getAllCategories(true, 'name', 'id');
        $tags = $this->controllerTags->getAllTags();

        return view('admin.post.create', compact('categories', 'tags'));
    }
}
