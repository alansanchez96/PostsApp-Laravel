<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\Role;

use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Src\Common\Interfaces\Laravel\Controller;

class RoleIndexController extends Controller
{
    public function __invoke(): View
    {
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }
}
