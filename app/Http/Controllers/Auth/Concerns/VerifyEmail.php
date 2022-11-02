<?php

namespace App\Http\Controllers\Auth\Concerns;

use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

trait VerifyEmail
{
    /**
     * Verificada o falla
     *
     * @param EmailVerificationRequest $request
     * @param string|null $verified
     * @return RedirectResponse
     */
    public function verifiedOrFail(EmailVerificationRequest $request, string $verified = null): RedirectResponse
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
    public function markVerified(EmailVerificationRequest $request): void
    {
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
    }
}
