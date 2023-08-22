<?php

namespace Src\Modules\Auth\Application\Queries;

use Src\Modules\Auth\Domain\Contracts\ILoginRepository;

class LogoutQuery
{
    public function __construct(private readonly ILoginRepository $repository) { }

    public function execute(): void
    {
        $this->repository->logout();

        session()->invalidate();
        
        session()->regenerateToken();
    }
}