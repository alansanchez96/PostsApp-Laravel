<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Application\GetTagUseCase;

class GetTag
{
    protected $getTag;

    public function __construct(GetTagUseCase $getTag)
    {
        $this->getTag = $getTag;
    }

    public function getTag($slug)
    {
        return $this->getTag->execute($slug);
    }
}
