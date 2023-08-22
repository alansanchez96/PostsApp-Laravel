<?php

namespace Src\Modules\Blog\Infrastructure\Http\Controllers\Dashboard\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class UserUpdateController extends Controller
{
    /**
     * Guarda los roles designados al usuario registrado.
     * Redirecciona a la ruta designada.
     *
     * @param Request $request
     * @param User $user
     * @return Redirector|RedirectResponse
     */
    public function __invoke(Request $request, User $user): Redirector|RedirectResponse
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.user.index')->with('update', 'Se ha actualizado el rol correctamente');
    }
}
