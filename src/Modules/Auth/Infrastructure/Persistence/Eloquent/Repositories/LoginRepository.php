<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Domain\Contracts\ILoginRepository;

class LoginRepository extends BaseRepository implements ILoginRepository
{
    /**
     * Intenta validar las credenciales del usuario
     *
     * @param UserEntity $user
     * @return boolean
     */
    public function attemptLogin(UserEntity $user): bool
    {
        try {
            return Auth::attempt([
                'email' => $user->email->getEmail(),
                'password' => $user->password->getPassword()
            ]);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}
