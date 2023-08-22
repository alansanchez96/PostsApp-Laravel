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
     * Obtiene el post y las colecciones de Category y Tag. Las dirige a la vista.
     *
     * @param mixed $post
     * @return View
     */
    public function __invoke(mixed $post): View
    {
        $columns        = array('id', 'name');
        $columnsPosts   = array('id', 'title', 'body', 'extract', 'category_id', 'status', 'user_id');

        $post           = $this->post->getPost($post, $columnsPosts);

        $categories     = $this->category->getAllCategories($columns);

        $categories     = $this->category->converterToPluck($categories, 'name', 'id');

        $tags           = $this->tag->getAllTags($columns);

        $this->authorize('author', $post);

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
