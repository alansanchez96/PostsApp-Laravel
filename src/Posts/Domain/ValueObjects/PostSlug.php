<?php

namespace Src\Posts\Domain\ValueObjects;

class PostSlug
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
