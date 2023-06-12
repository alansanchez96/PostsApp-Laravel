<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories;

use Src\Common\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Infrastructure\Jobs\RegisteredUser;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class RegisterRepository extends BaseRepository implements IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param array $data
     * @return void
     */
    public function registerAndNotify(UserEntity $user): void
    {
        try {
            $user = User::create([
                'name' => $this->capitalized($user->name->getName()),
                'email' => $this->lower($user->email->getEmail()),
                'password' => $this->stringHash($user->password->getPassword()),
                'email_verified_at' => null,
                'code' => $this->randomCode(6)
            ]);

            $this->registeredUser($user);

            $this->authenticate($user);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }

    /**
     * En segundo plano envía un Email al usuario registrado
     *
     * @param User $user
     * @return void
     */
    private function registeredUser(User $user): void
    {
        RegisteredUser::dispatch($user);
    }

    /**
     * Logea al usuario recientemente registrado
     *
     * @param User $user
     * @return void
     */
    private function authenticate(User $user): void
    {
        Auth::login($user);
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
            return User::firstWhere('code', $user->code->getCode());
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
                'code' => null
            ]);
        } catch (\Exception $e) {
            $this->catch($e->getMessage());
        }
    }
}
