<?php

namespace App\Http\Controllers\Admin\Tag;

use Src\Tags\Infrastructure\GetTag;
use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\GetColorsTag;

class TagEditController extends Controller
{
    protected $controllerTagEntity;

    protected $controllerColorsTag;

    public function __construct(GetTag $controllerTagEntity, GetColorsTag $controllerColorsTag)
    {
        $this->controllerTagEntity = $controllerTagEntity;
        $this->controllerColorsTag = $controllerColorsTag;
    }

    public function edit($slug)
    {
        $tag = $this->controllerTagEntity->getTag($slug);
        $colors = $this->controllerColorsTag->getColorsTag();

        return view('admin.tag.edit', compact('tag', 'colors'));
    }
}
