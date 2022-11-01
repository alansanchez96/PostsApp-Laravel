<?php

namespace App\Http\Controllers\Auth\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Routing\Redirector;

interface AuthInterface
{
    /**
     * Devuelve una vista del documento
     *
     * @return void
     */
    public function index();

    /**
     * Método para Autentificar al Usuario
     *
     * @param AuthRequest $request
     * @return void
     */
    public function login(AuthRequest $request, Redirector $redirector);

    public function logout(Request $request);
}
