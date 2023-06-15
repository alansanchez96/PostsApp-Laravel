<?php

namespace Src\Modules\Auth\Application\Commands;

use Src\Modules\Auth\Domain\Contracts\IProfileRepository;

class UpdateSettingsCommand
{
    public function __construct(private readonly IProfileRepository $repository) { }

    public function handle(array $data): void
    {
        $this->repository->updateSettings($data);
    }
}
