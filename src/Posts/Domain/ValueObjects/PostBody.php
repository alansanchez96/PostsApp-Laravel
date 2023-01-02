<?php

namespace Src\Posts\Domain\ValueObjects;

class PostBody
{
    private $body;

    public function __construct($body)
    {
        $this->body = $body;
    }

    public function value()
    {
        return $this->body;
    }
}
