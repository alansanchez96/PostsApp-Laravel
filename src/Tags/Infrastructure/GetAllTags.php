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

    public function getAllTags()
    {
        return $this->getAllTags->execute();
    }
}