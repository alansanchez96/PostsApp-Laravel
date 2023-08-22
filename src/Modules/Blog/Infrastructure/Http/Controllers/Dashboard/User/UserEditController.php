<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\User;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class UserEditController extends Controller
{
    /**
     * Retorna la vista para asignar un rol a un usuario registrado
     *
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }
}
