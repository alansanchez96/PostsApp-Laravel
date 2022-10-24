<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Devuelve la vista
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Metodo para Autentificar al Usuario
     *
     * @param AuthRequest $request
     * @return void
     */
    public function login(AuthRequest $request)
    {
        if (
            !Auth::attempt(
                $request->only('email', 'password'),
                $request->filled('remember')
            )
        ) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Metodo para Destruir la sesión del usuario
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }
}
