<?php

namespace App\Http\Controllers\User\Concerns;

use App\Http\Requests\User\UserInfoRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait UserInfoAdapter
{
    /**
     * Recibe al usuario autenticado y actualiza sus datos
     *
     * @param UserInfoRequest $request
     * @return void
     */
    public function updateInfoUser(UserInfoRequest $request): void
    {
        $user = $this->getUser();

        if ($request->email !== $user->email) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => null
            ]);
            $user->sendEmailVerificationNotification();
        } else {
            $user->update([
                'name' => $request->name
            ]);
        }
    }

    /**
     * Obtiene y envía al Usuario autenticado
     *
     * @return User
     */
    public function getUser(): User
    {
        return User::find(Auth::user()->id);
    }
}
