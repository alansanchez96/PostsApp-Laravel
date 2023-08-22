<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Category;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\SaveCategoryCommand;
use Src\Modules\Blog\Infrastructure\Http\Requests\CategoryRequest;

class CategoryStoreController extends Controller
{
    public function __construct(private readonly SaveCategoryCommand $command) { }
    /**
     * Valida que el request cumpla las condiciones.
     * Guarda el registro de la nueva categoria.
     * Redirecciona a la ruta indicada.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse|Redirector
     */
    public function __invoke(CategoryRequest $request): RedirectResponse|Redirector
    {
        $data = ['name'  =>  $request->name];

        $this->command->execute($data);

        return redirect()->route('admin.category.index')->with('create', 'La categoria se creó con éxito.');
    }
}
