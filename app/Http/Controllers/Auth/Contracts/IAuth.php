<?php

namespace App\Http\Controllers\Auth\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Routing\Redirector;

interface IAuth
{

    /**
     * Método para Autentificar al Usuario
     *
     * @param AuthRequest $request
     * @param Redirector $redirector
     * @return void
     */
    public function login(AuthRequest $request, Redirector $redirector);

    /**
     * Método para Destruir la sesión del usuario
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request);
}
