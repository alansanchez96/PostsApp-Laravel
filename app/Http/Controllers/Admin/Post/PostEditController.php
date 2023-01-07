<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Src\Posts\Infrastructure\GetPost;
use Src\Tags\Infrastructure\GetAllTags;
use Src\Categories\Infrastructure\GetAllCategories;

class PostEditController extends Controller
{
    /**
     * controller property GetPost
     *
     * @var GetPost
     */
    protected $controllerPost;

    /**
     * controller property GetAllCategories
     *
     * @var GetAllCategories
     */
    protected $controllerCategory;

    /**
     * controller property GetAllTags
     *
     * @var GetAllTags
     */
    protected $controllerTags;

    /**
     * method construct
     *
     * @param GetPost $controllerPost
     * @param GetAllCategories $controllerCategory
     * @param GetAllTags $controllerTags
     */
    public function __construct(GetPost $controllerPost, GetAllCategories $controllerCategory, GetAllTags $controllerTags)
    {
        $this->controllerPost = $controllerPost;
        $this->controllerCategory = $controllerCategory;
        $this->controllerTags = $controllerTags;
    }

    /**
     * Obtiene el post, las colecciones de CategoryModel y TagModel y las devuelve a la vista.
     * Retorna la vista
     *
     * @param mixed $post
     * @return View
     */
    public function edit($post): View
    {
        $post = $this->controllerPost->getPost($post);
        $categories = $this->controllerCategory->getAllCategories(true, 'name', 'id');
        $tags = $this->controllerTags->getAllTags();

        $this->authorize('author', $post);

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
