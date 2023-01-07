<?php

namespace App\Http\Controllers\Admin\Role;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleCreateController extends Controller
{
    /**
     * Retorna la vista para crear un RoleModel
     *
     * @return View
     */
    public function create(): View
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }
}
