<?php

namespace App\Http\Controllers\User\Contracts;

use App\Models\User;
use App\Http\Requests\User\UserSettingsRequest;

interface IUserSettings
{
    /**
     * Retorna la vista del documento
     *
     * @param User $user
     * @return void
     */
    public function settings();

    /**
     * Actualiza la información y configuraciones del usuario autenticado
     *
     * @param UserInfoRequest $request
     * @return mixed
     */
    public function update(UserSettingsRequest $request): mixed;
}
