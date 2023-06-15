<?php

namespace Src\Modules\Auth\Domain\Contracts;

interface IProfileRepository
{
    public function updateProfile(array $data): void;
}