<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers;

use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\SearchPostsQuery;
use Src\Modules\Blog\Application\Queries\GetCategoriesHandler;

class CategoryController extends Controller
{
    public function __construct(
        private readonly GetCategoriesHandler $handler,
        private readonly SearchPostsQuery $query
    ) {
    }

    public function __invoke(mixed $category)
    {
        $columns = array('id', 'title', 'slug', 'extract');

        $category = $this->handler->getCategory($category);

        $posts = $this->query->getPostsBy($category, 'categories', $columns, 5);

        return view('post.category', [
            'category' => $category,
            'posts' => $posts
        ]);
    }
}
