<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UserInfoRequest;
use App\Http\Controllers\User\Contracts\IUserInfo;
use App\Http\Controllers\User\Concerns\UserAdapter;

class UserInfoController extends Controller implements IUserInfo
{
    use UserAdapter;

    /**
     * Retorna la vista y parámetros
     *
     * @param User $user
     * @return View
     */
    public function profile(User $user): View
    {
        return view('user.profile', compact('user'));
    }

    /**
     * Actualiza la información del usuario autenticado
     *
     * @param UserInfoRequest $request
     * @return RedirectResponse
     */
    public function update(UserInfoRequest $request): RedirectResponse
    {
        $this->updateInfoUser($request);
        return back()->with('status', 'Datos actualizados correctamente');
    }
}
