<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use Src\Common\Interfaces\Laravel\Controller;

class VerifyCodeViewController extends Controller
{
    public function __invoke()
    {
        return view('auth.verify-code');
    }
}
