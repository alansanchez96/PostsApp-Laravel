<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Post;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetTagsHandler;
use Src\Modules\Blog\Application\Queries\GetPostsHandler;
use Src\Modules\Blog\Application\Queries\GetCategoriesHandler;

class PostEditController extends Controller
{
    public function __construct(
        private readonly GetPostsHandler $post,
        private readonly GetCategoriesHandler $category,
        private readonly GetTagsHandler $tag
    ) { }

    /**
     * Obtiene el post, las colecciones de CategoryModel y TagModel y las devuelve a la vista.
     * Retorna la vista
     *
     * @param mixed $post
     * @return View
     */
    public function __invoke(mixed $post): View
    {
        $columns = ['id', 'name'];

        $post = $this->post->getPost($post);

        $categories = $this->category->getAllCategories($columns);

        $categories = $this->category->converterToPluck($categories, 'name', 'id');

        $tags = $this->tag->getAllTags($columns);

        // $this->authorize('author', $post);

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
