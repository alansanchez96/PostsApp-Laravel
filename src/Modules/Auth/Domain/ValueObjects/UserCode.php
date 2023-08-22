<?php

namespace Src\Modules\Auth\Domain\ValueObjects;

final class UserCode
{
    public function __construct(private readonly ?string $code) { }

    /**
     * Get value of code
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  void
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }
}
