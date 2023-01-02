<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleCreateController extends Controller
{
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }
}
