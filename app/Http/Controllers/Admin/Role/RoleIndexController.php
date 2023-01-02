<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleIndexController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
}
