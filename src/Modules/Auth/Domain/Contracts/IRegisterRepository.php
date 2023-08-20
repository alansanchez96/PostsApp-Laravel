<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

interface IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param UserEntity $user
     * @return User
     */
    public function save(UserEntity $user): ?User;

    /**
     * Obtiene a un usuario por su Codigo
     *
     * @param UserEntity $user
     * @return User|null
     */
    public function getUserWithCode(UserEntity $user): ?User;

    /**
     * Confirma la cuenta del usuario
     *
     * @param User $user
     * @return void
     */
    public function confirmUser(User $user): void;
}
