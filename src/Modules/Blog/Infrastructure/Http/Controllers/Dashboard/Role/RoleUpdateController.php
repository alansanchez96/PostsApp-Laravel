<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Role;

use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Infrastructure\Http\Requests\RoleRequest;

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
    public function __invoke(RoleRequest $request, Role $role): Redirector|RedirectResponse
    {
        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.index')->with('update', 'El role se ha actualizado con éxito');
    }
}
