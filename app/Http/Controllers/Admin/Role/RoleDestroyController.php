<?php

namespace App\Http\Controllers\Admin\Role;

use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RoleDestroyController extends Controller
{
    /**
     * Metodo para eliminar un Role.
     * Redirecciona a la ruta designada luego de eliminarlo.
     *
     * @param Role $role
     * @return Redirector|RedirectResponse
     */
    public function destroy(Role $role): Redirector|RedirectResponse
    {
        $role->delete();

        return redirect()->route('admin.role.index')->with('delete', 'El role se ha eliminado con exito');
    }
}
