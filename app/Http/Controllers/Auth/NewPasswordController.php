<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Services\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\NewPasswordRequest;

class NewPasswordController extends Controller
{
    /**
     * Muestra la vista del input New Password Reset
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('auth.reset-password', compact('request'));
    }

    /**
     * Manipula el request de la nueva contraseña
     *
     * @param NewPasswordRequest $request
     * @return mixed
     */
    public function reset(NewPasswordRequest $request): mixed
    {
        $resetPassword = new ResetPassword($request->password);

        return $resetPassword->redirectAndSaveNewPassword($request);
    }
}
