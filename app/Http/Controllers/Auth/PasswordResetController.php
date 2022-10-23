<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function reset(Request $request)
    {
        return 'Se enviaron instrucciones a tu email' . $request->email;
    }
}
