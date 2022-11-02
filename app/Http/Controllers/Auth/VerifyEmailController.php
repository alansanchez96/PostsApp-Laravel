<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Services\VerifyEmail;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Verifica la dirección de correo electrónico
     *
     * @param EmailVerificationRequest $request
     * @return mixed
     */
    public function __invoke(EmailVerificationRequest $request): mixed
    {
        VerifyEmail::verifiedOrFail($request, '?verified=1');
        VerifyEmail::markVerified($request);

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
