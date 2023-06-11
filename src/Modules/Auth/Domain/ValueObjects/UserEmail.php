<?php

namespace Src\Modules\Auth\Domain\ValueObjects;

final class UserEmail
{
    public function __construct(private readonly ?string $email) { }

    /**
     * Get value of email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  void
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
}
