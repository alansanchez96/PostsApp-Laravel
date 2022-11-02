<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Contracts\IRegister;
use App\Http\Controllers\Auth\Services\NewUser;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller implements IRegister
{
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
        $user = NewUser::createAndNotify($request);

        Auth::login($user);

        return $redirector->intended(RouteServiceProvider::HOME);
    }
}
