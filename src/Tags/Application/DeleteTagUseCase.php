<?php

namespace Src\Tags\Application;

use Src\Tags\Domain\Contract\TagRepositoryContract;

class DeleteTagUseCase
{
    protected $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        return $this->repository->deleteTag($id);
    }
}
