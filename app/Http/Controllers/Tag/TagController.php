<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Tags\Infrastructure\GetPostsRelatedToTags;

class TagController extends Controller
{
    /**
     * controller GetPostsRelatedToTags
     *
     * @var TagModel
     */
    private $controller;

    /**
     * method construct
     *
     * @param GetPostsRelatedToTags $getPostsRelatedToTags
     */
    public function __construct(GetPostsRelatedToTags $getPostsRelatedToTags)
    {
        $this->controller = $getPostsRelatedToTags;
    }

    /**
     * Obtiene el TagModel consultado y devuelve todos las publicaciones con el tag relacionado.
     *
     * @param TagModel $tag
     * @return View
     */
    public function __invoke(TagModel $tag): View
    {
        $posts = $this->controller->execute($tag);
        
        return view('post.tag', compact('posts', 'tag'));
    }
}
