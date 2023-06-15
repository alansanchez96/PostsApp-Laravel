<?php

namespace Src\Modules\Auth\Domain\Contracts;

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
    public function updateSettings(array $data): void;
}