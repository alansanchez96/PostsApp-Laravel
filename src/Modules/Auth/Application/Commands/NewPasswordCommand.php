<?php

namespace Src\Modules\Auth\Application\Commands;

use Src\Modules\Auth\Domain\Contracts\IPasswordRepository;
use Src\Modules\Auth\Domain\Entities\UserEntity;

class NewPasswordCommand
{
    public function __construct(private readonly IPasswordRepository $repository) { }

    public function execute(array $credentials): string
    {
        return $this->repository->createNewPassword(
            new UserEntity($credentials),
            $credentials
        );
    }
}
