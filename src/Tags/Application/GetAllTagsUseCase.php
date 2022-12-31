<?php

namespace Src\Tags\Application;

use Src\Tags\Domain\Contract\TagRepositoryContract;

class GetAllTagsUseCase
{
    protected $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(bool $pluck = false, string $column = null, mixed $key = null)
    {
        return $this->repository->getAllTags($pluck, $column, $key);
    }
}
