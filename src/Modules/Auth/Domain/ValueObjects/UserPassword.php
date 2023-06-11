<?php

namespace Src\Modules\Auth\Domain\ValueObjects;

final class UserPassword
{
    public function __construct(private readonly ?string $password) { }

    /**
     * Get value of password
     *
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  void
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}