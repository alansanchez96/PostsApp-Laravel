<?php

namespace Src\Categories\Domain\ValueObjects;

class CategoryId
{
    /**
     * Id Property
     *
     * @var int
     */
    private ?int $id;

    public function __construct(?int $id)
    {
        $this->id = $id;
    }

    /**
     * Retorna el id
     *
     * @return integer
     */
    public function value(): ?int
    {
        return $this->id;
    }
}
