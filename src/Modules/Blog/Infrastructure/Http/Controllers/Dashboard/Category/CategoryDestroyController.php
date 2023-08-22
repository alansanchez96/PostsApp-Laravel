<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Category;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Application\Commands\DeleteCategoryCommand;

class CategoryDestroyController extends Controller
{
    public function __construct(private readonly DeleteCategoryCommand $command) { }

    /**
     * Elimina el registro del Model Category consultado
     *
     * @param mixed $category
     * @return RedirectResponse|Redirector
     */
    public function __invoke(mixed $category): RedirectResponse|Redirector
    {
        $data       = ['id' => !is_int($category) ? (int) $category : (string) $category];

        $response   = $this->command->deleteCategory($data);

        return $response
            ?   redirect()->route('admin.category.index')->with('delete', 'La categoria se ha eliminado')
            :   redirect()->route('admin.category.index')->with('info', 'La categoria no puede ser eliminada');
    }
}
