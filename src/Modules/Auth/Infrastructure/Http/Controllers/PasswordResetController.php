<?php

namespace Src\Modules\Auth\Infrastructure\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Src\Common\Interfaces\Laravel\Controller;
use Src\Modules\Auth\Application\Queries\PasswordResetQuery;
use Src\Modules\Auth\Infrastructure\Http\Request\PasswordResetRequest;

class PasswordResetController extends Controller
{
    public function __construct(private readonly PasswordResetQuery $passwordReset) { }

    public function __invoke(PasswordResetRequest $request): RedirectResponse
    {
        $data = array();

        $data['email'] = $request->email;

        $status = $this->passwordReset->execute($data);

        return $status == Password::RESET_LINK_SENT
                ?   back()->with('status', __($status))
                :   back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}