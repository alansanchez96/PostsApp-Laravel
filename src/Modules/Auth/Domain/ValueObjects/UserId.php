<?php

namespace Src\Modules\Auth\Domain\ValueObjects;

final class UserId
{
    public function __construct(private readonly ?int $id) { }

    /**
     * Get value of id
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  void
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}
