<?php

namespace App\Http\Controllers\Auth\Concerns;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Validation\ValidationException;

trait Authenticator
{
    /**
     * Intenta Logear al usuario con las credenciales otorgadas o fallará
     *
     * @param AuthRequest $request
     * @return void
     */
    public function loginOrFail(AuthRequest $request): void
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
