<?php

namespace App\Http\Controllers\Admin\Tag;

use Illuminate\View\View;
use Src\Tags\Infrastructure\GetTag;
use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\GetColorsTag;

class TagEditController extends Controller
{
    /**
     * controller property
     *
     * @var GetTag
     */
    protected $controllerTagEntity;

    /**
     * controller property
     *
     * @var GetColorTag
     */
    protected $controllerColorsTag;

    /**
     * method construct
     *
     * @param GetTag $controllerTagEntity
     * @param GetColorsTag $controllerColorsTag
     */
    public function __construct(GetTag $controllerTagEntity, GetColorsTag $controllerColorsTag)
    {
        $this->controllerTagEntity = $controllerTagEntity;
        $this->controllerColorsTag = $controllerColorsTag;
    }

    /**
     * Obtiene el TagModel y colores para enviarlo a la vista.
     * Retorna la vista para editar un TagModel
     *
     * @param mixed $slug
     * @return View
     */
    public function edit(mixed $slug): View
    {
        $tag = $this->controllerTagEntity->getTag($slug);
        $colors = $this->controllerColorsTag->getColorsTag();

        return view('admin.tag.edit', compact('tag', 'colors'));
    }
}
