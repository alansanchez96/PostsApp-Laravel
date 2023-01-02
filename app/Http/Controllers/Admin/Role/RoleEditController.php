<?php

namespace App\Http\Controllers\Admin\Role;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleEditController extends Controller
{
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }
}
