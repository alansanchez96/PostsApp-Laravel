<?php

namespace App\Http\Controllers\User\Concerns;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserInfoRequest;
use App\Http\Requests\User\UserSettingsRequest;

trait UserAdapter
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
     * Actualiza la nueva contraseña
     *
     * @param UserSettingsRequest $request
     * @return boolean|array
     */
    public function updateSettingsUser(UserSettingsRequest $request): bool|array
    {
        $user = $this->getUser();
        $response = $this->getPasswordResponse($request);

        return $response === true
            ? $user->update([
                'password' => Hash::make($request->password)
            ])
            : false;
    }

    /**
     * Obtiene una respuesta de la validación de contraseña
     *
     * @param UserSettingsRequest $request
     * @return boolean
     */
    public function getPasswordResponse(UserSettingsRequest $request): bool
    {
        $user = $this->getUser();
        return $this->validatePasswords($user, $request);
    }

    /**
     * Valida las contraseñas ingresadas
     *
     * @param User $user
     * @param UserSettingsRequest $request
     * @return boolean
     */
    public function validatePasswords(User $user, UserSettingsRequest $request): bool
    {
        if (
            !empty($request->password_current) &&
            Hash::check($request->password_current, $user->password)
        ) {
            if (
                $request->password === $request->password_confirmation &&
                $request->password_current !== $user->password &&
                $request->password_current !== $request->password
            ) {
                return true;
            }
        } else {
            return false;
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
