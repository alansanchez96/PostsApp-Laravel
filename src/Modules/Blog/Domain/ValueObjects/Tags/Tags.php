<?php

namespace Src\Modules\Blog\Domain\ValueObjects\Tags;

final class Tags
{
    public function __construct(private readonly ?array $tags) { }

    /**
     * Get the value of tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }
}
