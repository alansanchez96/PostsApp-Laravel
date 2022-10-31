<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SettingsRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()
                ->intended(RouteServiceProvider::HOME)
                ->with('status', 'La contraseña fue cambiada');
        } else {
            return back()->with('status', 'La contraseña actual no es correcta');
        }
    }
}
