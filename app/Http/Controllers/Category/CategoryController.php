<?php

namespace App\Http\Controllers\Category;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;
use Src\Categories\Infrastructure\GetCategory;

class CategoryController extends Controller
{
    /**
     * controller GetCategory
     *
     * @var CategoryModel
     */
    private $controllerCategory;

    /**
     * controller GetPost
     *
     * @var PostModel
     */
    private $controllerPost;

    /**
     * Method constructor
     *
     * @param GetCategory $category
     * @param GetPost $post
     */
    public function __construct(GetCategory $category, GetPost $post)
    {
        $this->controllerCategory = $category;
        $this->controllerPost = $post;
    }

    /**
     * Muestra la vista con información detallada del param $slug asociado al Modelo.
     *
     * @param mixed $slug
     * @return View
     */
    public function __invoke(mixed $slug): View
    {
        $category = $this->controllerCategory->getCategory($slug);
        $posts = $this->controllerPost->getCategoryPost($category->id);

        return view('post.category', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
