<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('user.profile', compact('user'));
    }

    public function updateProfile()
    {
        return 'Actualizando...';
    }
}
