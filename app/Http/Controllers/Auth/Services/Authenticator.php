<?php

namespace App\Http\Controllers\Auth\Services;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Validation\ValidationException;

class Authenticator
{
    public static function loginOrFail(AuthRequest $request)
    {
        if (
            !Auth::attempt(
                $request->only('email', 'password'),
                $request->filled('remember')
            )
        ) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }
    }
}
