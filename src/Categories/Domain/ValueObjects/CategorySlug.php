<?php

namespace Src\Categories\Domain\ValueObjects;

class CategorySlug
{
    /**
     * Slug Property
     *
     * @var string
     */
    private string $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Retorna el slug category
     *
     * @return string
     */
    public function value(): string
    {
        return $this->slug;
    }
}
