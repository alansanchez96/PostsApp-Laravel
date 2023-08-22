<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Tags;

final class TagColor
{
    public function __construct(private readonly ?string $color) { }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}
