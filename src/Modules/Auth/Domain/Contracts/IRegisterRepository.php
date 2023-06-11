<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Infrastructure\Http\Request\RegisterRequest;

interface IRegisterRepository
{
    /**
     * Registra a un usuario en db
     *
     * @param UserEntity $user
     * @return void
     */
    public function registerAndNotify(UserEntity $user): void;
}
