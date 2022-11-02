<?php

namespace App\Http\Controllers\Auth\Services;

use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmail
{
    /**
     * Verificada o falla
     *
     * @param EmailVerificationRequest $request
     * @param string|null $verified
     * @return RedirectResponse
     */
    public static function verifiedOrFail(EmailVerificationRequest $request, string $verified = null): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME . $verified);
        }
    }

    /**
     * Marca como verificado
     *
     * @param EmailVerificationRequest $request
     * @return void
     */
    public static function markVerified(EmailVerificationRequest $request): void
    {
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
    }
}
