<?php

namespace Src\Tags\Application;

use Src\Tags\Domain\Contract\TagRepositoryContract;

class SaveTagUseCase
{
    protected $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute($reqName, $reqSlug, $reqColor, int $id = null)
    {
        return $this->repository->save($reqName, $reqSlug, $reqColor, $id);
    }
}
