<?php

namespace Src\Categories\Domain\ValueObjects;

class CategorySlug
{
    private $slug;

    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function value()
    {
        return $this->slug;
    }
}
