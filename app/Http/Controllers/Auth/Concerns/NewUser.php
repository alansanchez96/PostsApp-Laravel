<?php

namespace App\Http\Controllers\Auth\Concerns;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisterRequest;

trait NewUser
{
    /**
     * Crear un usuario en la base de datos
     *
     * @param RegisterRequest $request
     * @return User
     */
    public function createAndNotify(RegisterRequest $request): User
    {
        $user = User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return $user;
    }
}
