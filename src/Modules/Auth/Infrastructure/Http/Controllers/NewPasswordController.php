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

        $status = $this->newPassword->execute($data);

        return $status == Password::PASSWORD_RESET
            ?   redirect()->route('login')->with('status', __($status))
            :   back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
    }

    private function getData($request): array
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'token' => $request->token
        ];
    }
}
