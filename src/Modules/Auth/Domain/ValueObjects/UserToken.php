<?php

namespace Src\Modules\Auth\Domain\ValueObjects;

final class UserToken
{
    public function __construct(private readonly ?string $token) { }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }
}
