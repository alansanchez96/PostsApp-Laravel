<?php

namespace App\Http\Controllers\Admin\Role;

use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\RoleRequest;

class RoleStoreController extends Controller
{
    /**
     * Metodo para crear un RoleModel y almacenarlo.
     * Redirecciona a la ruta designada.
     *
     * @param RoleRequest $request
     * @return Redirector|RedirectResponse
     */
    public function store(RoleRequest $request): Redirector|RedirectResponse
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.index')->with('create', 'El rol se creó con éxito');
    }
}
