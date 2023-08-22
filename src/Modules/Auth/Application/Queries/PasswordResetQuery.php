<?php

namespace Src\Modules\Auth\Application\Queries;

use Src\Modules\Auth\Domain\Contracts\IPasswordRepository;
use Src\Modules\Auth\Domain\Entities\UserEntity;

class PasswordResetQuery
{
    public function __construct(private readonly IPasswordRepository $repository) { }

    public function execute(array $data): void
    {
        $this->repository->sendResetLink(new UserEntity($data));
    }
}
