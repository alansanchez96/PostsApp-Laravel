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

    public function execute()
    {
        return $this->repository->getAllTags();
    }
}