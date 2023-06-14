<?php

namespace Src\Modules\Auth\Application\Queries;

use Src\Modules\Auth\Domain\Contracts\IPasswordRepository;

class PasswordResetQuery
{
    public function __construct(private readonly IPasswordRepository $repository) { }

    public function execute(array $data): string
    {
        return $this->repository->sendResetLink($data);
    }
}
