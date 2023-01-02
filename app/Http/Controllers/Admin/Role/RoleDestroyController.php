<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleDestroyController extends Controller
{
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.role.index')->with('delete', 'El role se ha eliminado con exito');
    }
}
