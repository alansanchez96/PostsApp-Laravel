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
        $data = array();

        $data['email'] = $request->email;
        $data['password'] = $request->password;

        ! $this->query->login($data) ?: $request->session()->regenerate();

        return $redirector
            ->intended(RouteServiceProvider::HOME)
            ->with('status', 'You are logged in');
    }
}
