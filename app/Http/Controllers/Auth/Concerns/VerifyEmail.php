<?php

namespace App\Http\Controllers\Auth\Concerns;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

trait VerifyEmail
{
    /**
     * Verificada o falla
     *
     * @param Request $request
     * @param string|null $verified
     * @return void
     */
    public function verifiedOrFail(Request $request, string $verified = null)
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
