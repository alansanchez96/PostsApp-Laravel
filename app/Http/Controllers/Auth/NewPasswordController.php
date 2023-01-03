<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\NewPasswordRequest;
use App\Http\Controllers\Auth\Services\ResetPassword;

class NewPasswordController extends Controller
{
    /**
     * Muestra la vista del input New Password Reset
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('auth.reset-password', compact('request'));
    }

    /**
     * Manipula el request de la nueva contraseña
     *
     * @param NewPasswordRequest $request
     * @return RedirectResponse|Redirector
     */
    public function reset(NewPasswordRequest $request): RedirectResponse|Redirector
    {
        return (new ResetPassword($request->password))->redirectAndSaveNewPassword($request);
    }
}
