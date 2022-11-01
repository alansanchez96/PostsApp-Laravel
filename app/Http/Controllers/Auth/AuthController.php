<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Contracts\IAuth;
use App\Http\Controllers\Auth\Services\Authenticator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Redirector;

class AuthController extends Controller implements IAuth
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
     * Método para Autentificar al Usuario
     *
     * @param AuthRequest $request
     * @return void
     */
    public function login(AuthRequest $request, Redirector $redirector)
    {
        Authenticator::loginOrFail($request);

        $request->session()->regenerate();

        return $redirector
            ->intended(RouteServiceProvider::HOME)
            ->with('status', 'You are logged in');
    }

    /**
     * Método para Destruir la sesión del usuario
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
