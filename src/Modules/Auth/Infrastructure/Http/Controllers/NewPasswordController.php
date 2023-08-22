<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Auth\Application\Commands\NewPasswordCommand;
use Src\Modules\Auth\Infrastructure\Http\Request\NewPasswordRequest;

class NewPasswordController extends Controller
{
    public function __construct(private readonly NewPasswordCommand $newPassword) { }

    public function __invoke(NewPasswordRequest $request)
    {
        $data = $this->getData($request);

        $response = $this->newPassword->execute($data);

        return !is_null($response)
            ?   redirect()->route('login')->with('status', 'Tu contraseña ha sido restablecida')
            :   back()->withInput($request->only('email'))
                    ->withErrors(['email' => 'Revisa bien los datos ingresados']);
    }

    private function getData($request): array
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'token' => $_COOKIE['token']
        ];
    }
}
