<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Role;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Src\Common\Interfaces\Laravel\Controller;

class RoleEditController extends Controller
{
    /**
     * Retorna la vista para editar el RolModel enviado
     *
     * @param Role $role
     * @return View
     */
    public function __invoke(Role $role): View
    {
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }
}
