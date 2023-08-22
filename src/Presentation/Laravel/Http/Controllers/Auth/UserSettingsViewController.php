<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use Src\Common\Interfaces\Laravel\Controller;

class UserSettingsViewController extends Controller
{
    public function __invoke()
    {
        return view('user.settings');
    }
}
