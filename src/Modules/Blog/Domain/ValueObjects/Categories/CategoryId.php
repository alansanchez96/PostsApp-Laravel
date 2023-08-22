<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Categories;

final class CategoryId
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
