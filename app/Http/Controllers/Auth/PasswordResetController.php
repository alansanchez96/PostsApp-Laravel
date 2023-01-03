<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\PasswordResetRequest;

class PasswordResetController extends Controller
{
    /**
     * Muestra la vista de Olvide Mi Contraseña
     *
     * @return View
     */
    public function index(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Manipula el envió de restablecimiento al correo electrónico
     *
     * @param PasswordResetRequest $request
     * @return RedirectResponse
     */
    public function send(PasswordResetRequest $request): RedirectResponse
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
