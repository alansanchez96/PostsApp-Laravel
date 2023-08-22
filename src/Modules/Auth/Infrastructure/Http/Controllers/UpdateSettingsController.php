<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Providers\RouteServiceProvider;
use Src\Modules\Auth\Application\Commands\UpdateSettingsCommand;
use Src\Modules\Auth\Infrastructure\Http\Request\UserSettingsRequest;

class UpdateSettingsController extends Controller
{
    public function __construct(private readonly UpdateSettingsCommand $command) { }

    public function __invoke(UserSettingsRequest $request)
    {
        $data = [
            'password_current' => $request->password_current,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ];

        $response = $this->command->handle($data);
        
        return !is_bool($response)
            ?   redirect()->back()->withErrors(['password' => $response])
            :   redirect()->back()->with('success', 'La contraseña fue cambiada');
    }
}
