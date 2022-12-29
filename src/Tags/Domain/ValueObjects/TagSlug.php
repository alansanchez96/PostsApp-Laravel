<?php

namespace Src\Tags\Domain\ValueObjects;

class TagSlug
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
