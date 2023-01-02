<?php

namespace App\Http\Controllers\Admin\Role;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;

class RoleUpdateController extends Controller
{
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.index')->with('update', 'El role se ha actualizado con éxito');
    }
}
