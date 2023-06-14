<?php

namespace Src\Modules\Auth\Domain\Contracts;

use Src\Modules\Auth\Domain\Entities\UserEntity;

interface IPasswordRepository
{
    public function sendResetLink(array $credential): string;

    public function createNewPassword(UserEntity $entity, array $credentials): ?string;
}