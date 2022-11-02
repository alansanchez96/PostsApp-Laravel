<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\PasswordResetRequest;

class PasswordResetController extends Controller
{
    /**
     * Muestra la vista de Olvide Mi Contraseña
     *
     * @return void
     */
    public function index()
    {
        return view('auth.forgot-password');
    }

    /**
     * Manipula el envió de restablecimiento al correo electrónico
     *
     * @param PasswordResetRequest $request
     * @return mixed
     */
    public function send(PasswordResetRequest $request): mixed
    {
        $status = Password::sendResetLink(
            $request->only(Str::lower('email'))
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
