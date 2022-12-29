<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Src\Tags\Infrastructure\SaveTag;
use App\Http\Requests\Admin\TagRequest;

class TagStoreController extends Controller
{
    protected $controller;

    public function __construct(SaveTag $controller)
    {
        $this->controller = $controller;
    }


    public function store(TagRequest $request)
    {
        $this->controller->saveTag($request);

        return redirect()->route('admin.tag.index')->with('create', 'La etiqueta se creó con éxito');
    }
}
