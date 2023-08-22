<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Providers\RouteServiceProvider;
use Src\Modules\Auth\Application\Commands\RegisterUserCommand;
use Src\Modules\Auth\Application\Handler\RegisterUserHandler;
use Src\Modules\Auth\Infrastructure\Http\Request\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Instancia el uso de caso para crear un usuario
     *
     * @param RegisterUserCommand $command
     */
    public function __construct(private readonly RegisterUserCommand $command) { }

    /**
     * Crea un nuevo usuario dentro de la base de datos
     *
     * @param RegisterRequest $request
     * @param Redirector $redirector
     * @return Redirector|RedirectResponse
     */
    public function __invoke(RegisterRequest $request, Redirector $redirector): Redirector|RedirectResponse
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $this->command->registerAUser($data);

        return $redirector->route('verify.email');
    }
}
