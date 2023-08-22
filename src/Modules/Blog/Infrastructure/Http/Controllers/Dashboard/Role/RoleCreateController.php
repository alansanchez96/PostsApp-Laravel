<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Role;

use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Src\Common\Interfaces\Laravel\Controller;

class RoleCreateController extends Controller
{
    /**
     * Retorna la vista para crear un RoleModel
     *
     * @return View
     */
    public function __invoke(): View
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }
}
