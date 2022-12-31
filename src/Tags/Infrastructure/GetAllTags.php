<?php

namespace Src\Tags\Infrastructure;

use Src\Tags\Application\GetAllTagsUseCase;

class GetAllTags
{
    protected $getAllTags;

    public function __construct(GetAllTagsUseCase $getAllTags)
    {
        $this->getAllTags = $getAllTags;
    }

    public function getAllTags(bool $pluck = false, string $column = null, mixed $key = null)
    {
        return $this->getAllTags->execute($pluck, $column, $key);
    }
}
