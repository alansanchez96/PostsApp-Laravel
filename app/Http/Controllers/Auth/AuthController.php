<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\Contracts\IAuth;
use App\Http\Controllers\Auth\Concerns\Authenticator;

class AuthController extends Controller implements IAuth
{
    use Authenticator;

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
     * @return mixed
     */
    public function login(AuthRequest $request, Redirector $redirector): mixed
    {
        $this->loginOrFail($request);

        $request->session()->regenerate();

        return $redirector
            ->intended(RouteServiceProvider::HOME)
            ->with('status', 'You are logged in');
    }

    /**
     * Método para Destruir la sesión del usuario
     *
     * @param Request $request
     * @return mixed
     */
    public function logout(Request $request): mixed
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }
}
