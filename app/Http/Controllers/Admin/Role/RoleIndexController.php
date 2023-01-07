<?php

namespace App\Http\Controllers\Admin\Role;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleIndexController extends Controller
{
    /**
     * Retorna la vista principal con todos los roles registrados
     *
     * @return View
     */
    public function index(): View
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
}
