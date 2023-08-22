<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers;

use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetTagsHandler;
use Src\Modules\Blog\Application\Queries\SearchPostsQuery;

class TagController extends Controller
{
    public function __construct(
        private readonly GetTagsHandler $handler,
        private readonly SearchPostsQuery $query
    ) {
    }

    public function __invoke(mixed $tag)
    {
        $columnsTags    = array('id', 'name', 'slug', 'color');
        $columnsPosts   = array('id', 'title', 'slug', 'extract');
        $relationship   = array('type' => 'tags', 'key' => 'tags.id');

        $tag = $this->handler->getTag($tag, $columnsTags);

        $posts = $this->query->getPostsBy($tag, $relationship, $columnsPosts, 5);

        return view('post.tag', [
            'tag'       => $tag,
            'posts'     => $posts
        ]);
    }
}
