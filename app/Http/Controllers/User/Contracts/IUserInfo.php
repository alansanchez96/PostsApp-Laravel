<?php

namespace App\Http\Controllers\User\Contracts;

use App\Models\User;
use App\Http\Requests\User\UserInfoRequest;

interface IUserInfo
{
    /**
     * Retorna la vista y parámetros
     *
     * @param User $user
     * @return void
     */
    public function profile(User $user);

    /**
     * Actualiza la información y configuraciones del usuario autenticado
     *
     * @param UserInfoRequest $request
     * @return mixed
     */
    public function update(UserInfoRequest $request): mixed;
}
