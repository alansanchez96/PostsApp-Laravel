<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Tag;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Queries\GetTagsHandler;

class TagEditController extends Controller
{
    public function __construct(private readonly GetTagsHandler $tag) { }

    /**
     * Obtiene el TagModel y colores para enviarlo a la vista.
     * Retorna la vista para editar un TagModel
     *
     * @param mixed $slug
     * @return View
     */
    public function __invoke(mixed $tag): View
    {
        $tag = $this->tag->getTag($tag);

        $colors = $this->tag->getColorsTag();

        return view('admin.tag.edit', compact('tag', 'colors'));
    }
}
