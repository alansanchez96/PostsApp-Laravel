<?php

namespace App\Http\Controllers\Auth\Services;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    /**
     * Crear un usuario en la base de datos
     *
     * @param RegisterRequest $request
     * @return User
     */
    public static function newUser(RegisterRequest $request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password),
        ]);
    }
}
