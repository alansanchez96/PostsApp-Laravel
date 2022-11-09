<?php

namespace Src\Posts\Domain;

use Src\Posts\Domain\ValueObjects\{
    PostId,
    PostTitle,
    PostExtract,
    PostBody,
    PostStatus
};



class PostEntity
{
    private $id;
    private $title;
    private $extract;
    private $body;
    private $status;

    public function __construct(
        ?PostId $id,
        ?PostTitle $title,
        ?PostExtract $extract,
        ?PostBody $body,
        ?PostStatus $status
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->extract = $extract;
        $this->body = $body;
        $this->status = $status;
    }

    public function status()
    {
        return $this->status;
    }
}
