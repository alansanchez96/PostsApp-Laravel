<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Tag;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetTagsHandler;

class TagCreateController extends Controller
{
    public function __construct(private readonly GetTagsHandler $tag) { }

    /**
     * Obtiene los colores designado en array y los ingresa en la vista.
     * Retorna la vista para crear un TagModel
     *
     * @return View
     */
    public function __invoke(): View
    {
        $colors = $this->tag->getColorsTag();

        return view('admin.tag.create', compact('colors'));
    }
}
