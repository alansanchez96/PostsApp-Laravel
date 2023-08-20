<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use App\Http\Controllers\Controller;
use Src\Modules\Auth\Application\Commands\RegisterUserCommand;

class SendEmailCodeController extends Controller
{
    public function __construct(private readonly RegisterUserCommand $command) { }

    public function __invoke()
    {
        $this->command->sendEmail();

        $value = 'El email ha sido enviado. Verifica tu casilla de correo electronico';

        return redirect()->route('verify.code')->with('status', $value);
    }
}
