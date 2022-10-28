<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->email !== $user->email) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => null,
            ]);
            $user->sendEmailVerificationNotification();
        } else {
            $user->update([
                'name' => $request->name,
            ]);
        }

        return back()->with('status', 'Datos actualizados correctamente');
    }
}
