<?php

namespace App\Http\Controllers\Auth\Services;

use Illuminate\Support\Str;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\Auth\NewPasswordRequest;

class ResetPassword
{
    /**
     * Password Property
     *
     * @var private
     */
    private $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    /**
     * Redireccionar al Usuario con Notificación luego de Guardar su contraseña nueva
     *
     * @param NewPasswordRequest $request
     * @return RedirectResponse|Redirector
     */
    public function redirectAndSaveNewPassword(NewPasswordRequest $request): RedirectResponse|Redirector
    {
        $status = $this->getStatus($request);

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }

    /**
     * Resetear la nueva contraseña y retornar el estado
     *
     * @param NewPasswordRequest $request
     * @return mixed
     */
    public function getStatus(NewPasswordRequest $request): mixed
    {
        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status;
    }
}
