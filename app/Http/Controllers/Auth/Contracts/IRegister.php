<?php

namespace App\Http\Controllers\Auth\Contracts;

use Illuminate\Routing\Redirector;
use App\Http\Requests\Auth\RegisterRequest;

interface IRegister
{
    /**
     * Crea un nuevo usuario dentro de la base de datos
     *
     * @param RegisterRequest $request
     * @param Redirector $redirector
     * @return void
     */
    public function register(RegisterRequest $request, Redirector $redirector);
}
