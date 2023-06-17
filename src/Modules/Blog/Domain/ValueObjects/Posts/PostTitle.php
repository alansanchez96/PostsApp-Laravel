<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Posts;

final class PostTitle
{
    public function __construct(private readonly ?string $title) { }
    
    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}
