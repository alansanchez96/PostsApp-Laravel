<?php

namespace App\Http\Controllers\User\Contracts;

use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UserSettingsRequest;

interface IUserSettings
{
    /**
     * Devuelve la vista del documento
     *
     * @return View
     */
    public function settings(): View;

    /**
     * Actualiza la contraseña del usuario autenticado
     *
     * @param UserSettingsRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(UserSettingsRequest $request): RedirectResponse|Redirector;
}
