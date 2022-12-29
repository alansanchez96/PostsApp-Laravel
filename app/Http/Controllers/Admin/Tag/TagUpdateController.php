<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\SaveTag;
use App\Http\Requests\Admin\TagRequest;

class TagUpdateController extends Controller
{
    protected $controller;

    public function __construct(SaveTag $controller)
    {
        $this->controller = $controller;
    }

    public function update(TagRequest $request, int $id)
    {
        $this->controller->saveTag($request, $id);

        return redirect()->route('admin.tag.index')->with('update', 'La etiqueta se actualizó con éxito');
    }
}
