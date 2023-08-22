<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Role;

use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;

class RoleDestroyController extends Controller
{
    /**
     * Metodo para eliminar un Role.
     * Redirecciona a la ruta designada luego de eliminarlo.
     *
     * @param Role $role
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Role $role): Redirector|RedirectResponse
    {
        $role->delete();

        return redirect()->route('admin.role.index')->with('delete', 'El role se ha eliminado con exito');
    }
}
