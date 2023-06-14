<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Domain\Entities\UserEntity;

interface ILoginRepository
{
    /**
     * Intenta validar las credenciales del usuario
     *
     * @param UserEntity $user
     * @return boolean
     */
    public function attemptLogin(UserEntity $user): bool;

    /**
     * Invalida la sesion del usuario
     *
     * @return void
     */
    public function logout(): void;
}