<?php
namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\GetAllTags;

class TagIndexController extends Controller
{
    protected $controller;

    public function __construct(GetAllTags $controller)
    {
        $this->controller = $controller;
    }


    public function index()
    {
        $tags = $this->controller->getAllTags();

        return view('admin.tag.index', compact('tags'));
    }
}