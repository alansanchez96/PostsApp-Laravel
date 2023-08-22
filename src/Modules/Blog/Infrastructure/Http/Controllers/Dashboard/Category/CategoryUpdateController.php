<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Category;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\UpdateCategoryCommand;
use Src\Modules\Blog\Infrastructure\Http\Requests\CategoryRequest;

class CategoryUpdateController extends Controller
{
    public function __construct(private readonly UpdateCategoryCommand $command) { }

    /**
     * Valida que el request cumpla las condiciones.
     * Guarda el nuevo registro de la categoria.
     * Redirecciona a la ruta indicada.
     *
     * @param CategoryRequest $request
     * @param int $category
     * @return RedirectResponse|Redirector
     */
    public function __invoke(CategoryRequest $request, int $category): RedirectResponse|Redirector
    {
        $data = [
            'id'    =>  !is_int($category) ? (int) $category : (string) $category,
            'name'  =>  $request->name
        ];

        $this->command->execute($data);

        return redirect()->route('admin.category.index')->with('update', 'La categoria se actualizó con éxito');
    }
}
