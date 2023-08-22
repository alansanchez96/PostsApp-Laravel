<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Post;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\{GetTagsHandler, GetCategoriesHandler};

class PostCreateController extends Controller
{
    public function __construct(private readonly GetCategoriesHandler $category, private readonly GetTagsHandler $tag) { }

    /**
     * Obtiene la coleccion de CategoryModel y TagModel pasandolos a la vista.
     * Devuelve la vista para crear un PostModel.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $columns = ['id', 'name'];

        $categories = $this->category->getAllCategories($columns);

        $categories = $this->category->converterToPluck($categories, 'name', 'id');

        $tags = $this->tag->getAllTags($columns);

        return view('admin.post.create', compact('categories', 'tags'));
    }
}
