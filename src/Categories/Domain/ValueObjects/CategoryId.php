<?php

namespace Src\Categories\Domain\ValueObjects;

class CategoryId
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
