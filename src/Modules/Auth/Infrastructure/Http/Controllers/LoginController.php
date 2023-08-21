<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Providers\RouteServiceProvider;
use Src\Modules\Auth\Application\Queries\LoginUserQuery;
use Src\Modules\Auth\Infrastructure\Http\Request\LoginRequest;

class LoginController extends Controller
{
    public function __construct(private readonly LoginUserQuery $query) { }

    /**
     * Manda la informacion para intentar logear, si todo es correcto valida la sesion
     *
     * @param LoginRequest $request
     * @param Redirector $redirector
     * @return Redirector|RedirectResponse
     */
    public function __invoke(LoginRequest $request, Redirector $redirector): Redirector|RedirectResponse
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!$this->query->login($data)) return $redirector->back()->withErrors(['login' => 'Invalid Credentials']);

        $request->session()->regenerate();

        return $redirector
            ->intended(RouteServiceProvider::HOME)
            ->with('success', 'Bienvenido nuevamente');
    }
}
