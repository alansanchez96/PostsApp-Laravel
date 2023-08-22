<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Tag;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Infrastructure\Persistence\Tag;

class TagIndexController extends Controller
{
    public function __invoke(): View
    {
        $tags = Tag::all();

        return view('admin.tag.index', compact('tags'));
    }
}
