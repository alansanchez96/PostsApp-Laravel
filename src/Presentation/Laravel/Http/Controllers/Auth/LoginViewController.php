<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;

class LoginViewController extends Controller
{
    public function __invoke(): View
    {
        return view('auth.login');
    }
}
