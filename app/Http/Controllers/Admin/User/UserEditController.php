<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserEditController extends Controller
{
    /**
     * Retorna la vista para asignar un rol a un usuario registrado
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }
}
