<?php

namespace App\Http\Controllers\Auth\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\Auth\NewPasswordRequest;
use Illuminate\Support\Facades\Password;

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
     * @return mixed
     */
    public function redirectAndSaveNewPassword(NewPasswordRequest $request): mixed
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
     * @param $request
     * @return mixed
     */
    public function getStatus($request): mixed
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
