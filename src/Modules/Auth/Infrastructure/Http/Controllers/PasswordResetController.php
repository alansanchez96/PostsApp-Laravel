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
        $data = [
            'email' => $request->email
        ];

        $this->passwordReset->execute($data);

        return back()->with('status', __('passwords.sent'));
    }
}