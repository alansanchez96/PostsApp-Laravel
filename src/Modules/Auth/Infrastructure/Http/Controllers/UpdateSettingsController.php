<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Providers\RouteServiceProvider;
use App\Http\Requests\User\UserSettingsRequest;
use Src\Modules\Auth\Application\Commands\UpdateSettingsCommand;

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

        $this->command->handle($data);

        return redirect()
            ->intended(RouteServiceProvider::HOME)
            ->with('status', 'La contraseña fue cambiada');
    }
}
