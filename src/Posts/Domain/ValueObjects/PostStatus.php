<?php

namespace Src\Posts\Domain\ValueObjects;

class PostStatus
{
    private $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function value()
    {
        return $this->status;
    }

    public function actives()
    {
        $actives = $this->status = 2;
        return $actives;
    }
}
