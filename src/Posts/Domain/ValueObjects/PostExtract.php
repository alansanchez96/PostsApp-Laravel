<?php

namespace Src\Posts\Domain\ValueObjects;

class PostExtract
{
    private $extract;

    public function __construct($extract)
    {
        $this->extract = $extract;
    }

    public function value()
    {
        return $this->extract;
    }
}
