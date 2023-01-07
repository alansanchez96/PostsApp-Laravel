<?php

namespace App\Http\Controllers\Admin\Role;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleEditController extends Controller
{
    /**
     * Retorna la vista para editar el RolModel enviado
     *
     * @param Role $role
     * @return View
     */
    public function edit(Role $role): View
    {
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }
}
