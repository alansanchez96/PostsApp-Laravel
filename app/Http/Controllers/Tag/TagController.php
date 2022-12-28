<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Infrastructure\GetPostsRelatedToTags;

class TagController extends Controller
{
    private $controller;

    public function __construct(GetPostsRelatedToTags $getPostsRelatedToTags)
    {
        $this->controller = $getPostsRelatedToTags;
    }

    public function __invoke(TagModel $tag)
    {
        $posts = $this->controller->execute($tag);
        
        return view('post.tag', compact('posts', 'tag'));
    }
}
