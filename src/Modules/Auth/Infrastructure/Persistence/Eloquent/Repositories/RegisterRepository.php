<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class RegisterRepository extends BaseRepository implements IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param array $data
     * @return User
     */
    public function save(UserEntity $user): ?User
    {
        try {
            return User::create([
                'name' => $this->capitalized($user->name->getName()),
                'email' => $this->lower($user->email->getEmail()),
                'password' => $this->stringHash($user->password->getPassword()),
                'email_verified_at' => null,
                'code' => $this->randomCode(6)
            ]);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    /**
     * Obtiene a un usuario por su Codigo
     *
     * @param UserEntity $user
     * @return User|null
     */
    public function getUserWithCode(UserEntity $user): ?User
    {
        try {
            return User::where('code', $user->code->getCode())->first();
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    /**
     * Confirma la cuenta del usuario
     *
     * @param User $user
     * @return void
     */
    public function confirmUser(User $user): void
    {
        try {
            $user->update([
                'email_verified_at' => now(),
                'code'              => null
            ]);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}
