<?php

namespace App\Http\Controllers\User\Contracts;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UserInfoRequest;

interface IUserInfo
{
    /**
     * Retorna la vista y parámetros
     *
     * @param User $user
     * @return View
     */
    public function profile(User $user): View;

    /**
     * Actualiza la información del usuario autenticado
     *
     * @param UserInfoRequest $request
     * @return RedirectResponse
     */
    public function update(UserInfoRequest $request): RedirectResponse;
}
