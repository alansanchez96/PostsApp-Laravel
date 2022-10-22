<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request)
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

        $request->session()->regenerate();

        return redirect('home')->with('status', 'You are logged in');
    }
} {
}
