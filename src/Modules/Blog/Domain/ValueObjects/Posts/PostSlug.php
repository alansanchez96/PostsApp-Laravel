<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Posts;

final class PostSlug
{
    public function __construct(private readonly ?string $slug) { }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }
}
