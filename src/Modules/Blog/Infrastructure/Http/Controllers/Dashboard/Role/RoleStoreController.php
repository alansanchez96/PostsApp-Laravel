<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Role;

use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Blog\Infrastructure\Http\Requests\RoleRequest;

class RoleStoreController extends Controller
{
    /**
     * Metodo para crear un RoleModel y almacenarlo.
     * Redirecciona a la ruta designada.
     *
     * @param RoleRequest $request
     * @return Redirector|RedirectResponse
     */
    public function __invoke(RoleRequest $request): Redirector|RedirectResponse
    {
        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.index')->with('create', 'El rol se creó con éxito');
    }
}
