<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Posts;

final class PostStatus
{
    public function __construct(private readonly ?int $status) { }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
