<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\AuthRequest;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\Contracts\IAuth;
use App\Http\Controllers\Auth\Concerns\Authenticator;
use Illuminate\View\View;

class AuthController extends Controller implements IAuth
{
    use Authenticator;

    /**
     * Devuelve la vista para autenticarse
     *
     * @return View
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Método para Autentificar al Usuario
     *
     * @param AuthRequest $request
     * @param Redirector $redirector
     * @return RedirectResponse
     */
    public function login(AuthRequest $request, Redirector $redirector): RedirectResponse
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
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('post.index');
    }
}
