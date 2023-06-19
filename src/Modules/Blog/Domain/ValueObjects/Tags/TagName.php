<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Tags;

final class TagName
{
    public function __construct(private readonly ?string $name) { }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
