<?php

namespace Src\Presentation\Laravel\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class UserProfileViewController extends Controller
{
    public function __invoke()
    {
        return view('user.profile');
    }
}
