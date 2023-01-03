<?php

namespace App\Http\Controllers\Auth\Contracts;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\AuthRequest;

interface IAuth
{
    /**
     * Método para Autentificar al Usuario
     *
     * @param AuthRequest $request
     * @param Redirector $redirector
     * @return RedirectResponse
     */
    public function login(AuthRequest $request, Redirector $redirector): RedirectResponse;

    /**
     * Método para Destruir la sesión del usuario
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse;
}
