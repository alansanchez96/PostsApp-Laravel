<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\Concerns\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    use VerifyEmail;
    /**
     * Verifica la dirección de correo electrónico
     *
     * @param EmailVerificationRequest $request
     * @return mixed
     */
    public function __invoke(EmailVerificationRequest $request): mixed
    {
        $this->verifiedOrFail($request, '?verified=1');
        $this->markVerified($request);

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
