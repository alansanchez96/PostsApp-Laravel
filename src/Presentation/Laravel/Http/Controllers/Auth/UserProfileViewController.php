<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use Src\Common\Interfaces\Laravel\Controller;

class UserProfileViewController extends Controller
{
    public function __invoke()
    {
        return view('user.profile');
    }
}
