<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Tags;

final class TagId
{
    public function __construct(private readonly ?int $id) { }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
