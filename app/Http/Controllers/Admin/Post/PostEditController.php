<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Src\Categories\Infrastructure\GetAllCategories;
use Src\Posts\Infrastructure\GetPost;
use Src\Tags\Infrastructure\GetAllTags;

class PostEditController extends Controller
{
    protected $controllerPost;

    protected $controllerCategory;

    protected $controllerTags;

    public function __construct(GetPost $controllerPost, GetAllCategories $controllerCategory, GetAllTags $controllerTags)
    {
        $this->controllerPost = $controllerPost;
        $this->controllerCategory = $controllerCategory;
        $this->controllerTags = $controllerTags;
    }

    public function edit($slug)
    {
        $post = $this->controllerPost->getPost($slug);
        $categories = $this->controllerCategory->getAllCategories(true, 'name', 'id');
        $tags = $this->controllerTags->getAllTags();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
