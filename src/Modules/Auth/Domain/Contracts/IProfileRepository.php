<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

interface IProfileRepository
{
    /**
     * Manipulador de la Actualizacion de Informacion del usuario
     *
     * @param array $data
     * @return void
     */
    public function updateProfile(array $data): void;

    /**
     * Manipulador para actualizar la contraseña del Usuario
     *
     * @param array $data
     * @return void
     */
    public function updateSettings(User $user, array $data): void;

    /**
     * Retorna el usuario autenticado
     *
     * @return User
     */
    public function getUser(): User;
}
