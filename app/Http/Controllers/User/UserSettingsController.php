<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\User\UserSettingsRequest;
use App\Http\Controllers\User\Concerns\UserAdapter;
use App\Http\Controllers\User\Contracts\IUserSettings;

class UserSettingsController extends Controller implements IUserSettings
{
    use UserAdapter;

    /**
     * Devuelve la vista del documento
     *
     * @return View
     */
    public function settings(): View
    {
        return view('user.settings');
    }

    /**
     * Actualiza la contraseña del usuario autenticado
     *
     * @param UserSettingsRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(UserSettingsRequest $request): RedirectResponse|Redirector
    {
        $update = $this->updateSettingsUser($request);

        return $update === true
            ? redirect()->intended(RouteServiceProvider::HOME)->with('status', 'La contraseña fue cambiada')
            : back()->with('status', 'La contraseña actual no es correcta');
    }
}
