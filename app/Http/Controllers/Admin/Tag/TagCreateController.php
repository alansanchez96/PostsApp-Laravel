<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\GetColorsTag;

class TagCreateController extends Controller
{
    protected $controller;

    public function __construct(GetColorsTag $controller)
    {
        $this->controller = $controller;
    }


    public function create()
    {
        $colors = $this->controller->getColorsTag();

        return view('admin.tag.create', compact('colors'));
    }
}
