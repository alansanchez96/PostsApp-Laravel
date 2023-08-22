<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Posts;

final class PostBody
{
    public function __construct(private readonly ?string $body) { }

    /**
     * Get the value of body
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @return  self
     */ 
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
