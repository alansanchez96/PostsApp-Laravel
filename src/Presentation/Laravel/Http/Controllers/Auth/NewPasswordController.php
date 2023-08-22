<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Common\Exceptions\EntityNotFoundException;

class NewPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $user = User::where('token', $request->token)->first();

            if (!$user && !isset($user->code) && !isset($user->email_verified_at))
                throw new EntityNotFoundException('Usuario no encontrado o no ha válido su email');

            setcookie('token', $request->token, time() + 86400, route('password.reset'));

            return view('auth.reset-password', compact('request'));
        } catch (EntityNotFoundException $e) {
            abort(404);
        }
    }
}
