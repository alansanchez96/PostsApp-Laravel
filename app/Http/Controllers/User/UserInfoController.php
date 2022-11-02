<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserInfoRequest;
use App\Http\Controllers\User\Contracts\IUserInfo;
use App\Http\Controllers\User\Concerns\UserInfoAdapter;

class UserInfoController extends Controller implements IUserInfo
{
    use UserInfoAdapter;

    /**
     * Retorna la vista y parámetros
     *
     * @param User $user
     * @return void
     */
    public function profile(User $user)
    {
        return view('user.profile', compact('user'));
    }

    /**
     * Actualiza la información del usuario autenticado
     *
     * @param UserInfoRequest $request
     * @return mixed
     */
    public function update(UserInfoRequest $request): mixed
    {
        $this->updateInfoUser($request);

        return back()->with('status', 'Datos actualizados correctamente');
    }
}
