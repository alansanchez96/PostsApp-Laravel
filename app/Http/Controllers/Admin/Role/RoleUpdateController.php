<?php

namespace App\Http\Controllers\Admin\Role;

use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\RoleRequest;

class RoleUpdateController extends Controller
{
    /**
     * Valida que el request se cumpla sus requisitos.
     * Actualiza el RoleModel almacenado.
     * Redirecciona a la ruta designada.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return Redirector|RedirectResponse
     */
    public function update(RoleRequest $request, Role $role): Redirector|RedirectResponse
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.index')->with('update', 'El role se ha actualizado con éxito');
    }
}
