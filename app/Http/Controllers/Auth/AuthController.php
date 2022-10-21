<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credencials = $request->only('email', 'password');

        if (!Auth::attempt($credencials)) {
            return 'Log Failed';
        }

        $request->session()->regenerate();

        return 'You are logged';
    }
} {
}
