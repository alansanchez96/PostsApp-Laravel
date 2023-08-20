<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class VerifyCodeViewController extends Controller
{
    public function __invoke()
    {
        return view('auth.verify-code');
    }
}
