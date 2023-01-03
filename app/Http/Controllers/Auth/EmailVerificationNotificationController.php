<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Auth\Concerns\VerifyEmail;

class EmailVerificationNotificationController extends Controller
{
    use VerifyEmail;
    
    /**
     * Envía una nueva verificación de Email
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function send(Request $request): RedirectResponse
    {
        $this->verifiedOrFail($request);
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
