<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Posts;

final class PostExtract
{
    public function __construct(private readonly ?string $extract) { }

    /**
     * Get the value of extract
     */ 
    public function getExtract()
    {
        return $this->extract;
    }

    /**
     * Set the value of extract
     *
     * @return  self
     */ 
    public function setExtract($extract)
    {
        $this->extract = $extract;

        return $this;
    }
}
