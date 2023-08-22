<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use Illuminate\View\View;
use Src\Common\Interfaces\Laravel\Controller;

class PasswordResetController extends Controller
{
    public function __invoke(): View
    {
        return view('auth.forgot-password');
    }
}
