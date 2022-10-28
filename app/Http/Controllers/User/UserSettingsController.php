<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SettingsRequest;
use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function settings()
    {
        return view('user.settings');
    }

    public function updateSettings(SettingsRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $response = $request->validatePasswords($user);
        if ($response) {
            return 'cambiando..';
        } else {
            return 'algo salio mal..';
        }
    }
}
