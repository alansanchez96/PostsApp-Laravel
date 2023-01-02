<?php

namespace Src\Posts\Domain\ValueObjects;

class PostId
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function value()
    {
        return $this->id;
    }
}
