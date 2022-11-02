<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Services\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        VerifyEmail::verifiedOrFail($request);
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
