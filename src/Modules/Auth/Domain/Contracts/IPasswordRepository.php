<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Domain\Entities\UserEntity;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

interface IPasswordRepository
{
    public function sendResetLink(UserEntity $entity): void;

    public function createNewPassword(UserEntity $entity): ?User;
}