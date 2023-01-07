<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Src\Tags\Infrastructure\GetAllTags;

class TagIndexController extends Controller
{
    /**
     * controller property
     *
     * @var GetAllTags
     */
    protected $controller;

    public function __construct(GetAllTags $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Retorna la vista con la coleccion de TagModel
     *
     * @return View
     */
    public function index(): View
    {
        $tags = $this->controller->getAllTags();

        return view('admin.tag.index', compact('tags'));
    }
}
