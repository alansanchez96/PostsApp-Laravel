<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\PasswordResetRequest;

class PasswordResetController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function reset(PasswordResetRequest $request)
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }
}
