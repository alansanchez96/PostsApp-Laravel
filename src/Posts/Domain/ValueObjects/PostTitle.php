<?php

namespace Src\Posts\Domain\ValueObjects;

class PostTitle
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function value()
    {
        return $this->title;
    }
}
