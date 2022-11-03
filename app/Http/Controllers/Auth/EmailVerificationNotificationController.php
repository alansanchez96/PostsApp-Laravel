<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Concerns\VerifyEmail;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Envía una nueva verificación de Email
     *
     * @param Request $request
     * @return mixed
     */
    public function send(Request $request): mixed
    {
        $this->verifiedOrFail($request);
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
