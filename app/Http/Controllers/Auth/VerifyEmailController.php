<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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
     * @return Redirector|RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request): Redirector|RedirectResponse
    {
        $this->verifiedOrFail($request, '?verified=1');
        $this->markVerified($request);

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }
}
