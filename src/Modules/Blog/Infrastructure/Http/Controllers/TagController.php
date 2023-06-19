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
        $columns = array('id', 'title', 'slug', 'extract');

        $relationship = [
            'type' => 'tags',
            'key' => 'tags.id'
        ];

        $tag = $this->handler->getTag($tag);

        $posts = $this->query->getPostsBy($tag, $relationship, $columns, 5);

        return view('post.tag', [
            'tag' => $tag,
            'posts' => $posts
        ]);
    }
}
