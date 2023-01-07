<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Src\Tags\Infrastructure\GetColorsTag;

class TagCreateController extends Controller
{
    /**
     * controller property
     *
     * @var GetColorTag
     */
    protected $controller;

    public function __construct(GetColorsTag $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Obtiene los colores designado en array y los ingresa en la vista.
     * Retorna la vista para crear un TagModel
     *
     * @return View
     */
    public function create(): View
    {
        $colors = $this->controller->getColorsTag();

        return view('admin.tag.create', compact('colors'));
    }
}
