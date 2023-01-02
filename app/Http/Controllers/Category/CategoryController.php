<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;
use Src\Categories\Infrastructure\GetCategory;

class CategoryController extends Controller
{
    private $controllerCategory;
    private $controllerPost;

    public function __construct(GetCategory $category, GetPost $post)
    {
        $this->controllerCategory = $category;
        $this->controllerPost = $post;
    }

    public function __invoke($slug)
    {
        $category = $this->controllerCategory->getCategory($slug);

        $posts = $this->controllerPost->getCategoryPost($category->id);

        return view('post.category', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
