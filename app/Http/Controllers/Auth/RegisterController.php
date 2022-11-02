<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Auth\Concerns\NewUser;
use App\Http\Controllers\Auth\Contracts\IRegister;

class RegisterController extends Controller implements IRegister
{
    use NewUser;
    /**
     * Muestra la vista del Formulario de Registro
     *
     * @return void
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Crea un nuevo usuario dentro de la base de datos
     *
     * @param RegisterRequest $request
     * @param Redirector $redirector
     * @return void
     */
    public function register(RegisterRequest $request, Redirector $redirector)
    {
        $user = $this->createAndNotify($request);

        Auth::login($user);

        return $redirector->intended(RouteServiceProvider::HOME);
    }
}
