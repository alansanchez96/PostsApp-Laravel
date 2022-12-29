<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\DeleteTag;

class TagDestroyController extends Controller
{
    protected $controller;

    public function __construct(DeleteTag $controller)
    {
        $this->controller = $controller;
    }

    public function destroy(int $id)
    {
        $this->controller->deleteTag($id);

        return redirect()->route('admin.tag.index')->with('delete', 'La etiqueta se ha eliminado');
    }
}
