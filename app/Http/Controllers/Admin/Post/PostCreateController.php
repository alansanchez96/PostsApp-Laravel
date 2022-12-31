<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Src\Categories\Infrastructure\GetAllCategories;
use Src\Tags\Infrastructure\GetAllTags;

class PostCreateController extends Controller
{
    protected $controllerCategory;

    protected $controllerTags;

    public function __construct(GetAllCategories $controllerCategory, GetAllTags $controllerTags)
    {
        $this->controllerCategory = $controllerCategory;
        $this->controllerTags = $controllerTags;
    }


    public function create()
    {
        $categories = $this->controllerCategory->getAllCategories(true, 'name', 'id');
        $tags = $this->controllerTags->getAllTags();

        return view('admin.post.create', compact('categories', 'tags'));
    }
}
