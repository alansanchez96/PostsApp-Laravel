<?php

namespace Src\Tags\Domain\ValueObjects;

class TagId
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
