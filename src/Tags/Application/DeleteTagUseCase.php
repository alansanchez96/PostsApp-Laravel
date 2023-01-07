<?php

namespace Src\Tags\Application;

use Src\Tags\Domain\Contract\TagRepositoryContract;

class DeleteTagUseCase
{
    /**
     * Repository property
     *
     * @var TagRepository
     */
    protected $repository;

    public function __construct(TagRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtiene el ModelTag y elimina su registro
     *
     * @param integer $id
     * @return void
     */
    public function execute(int $id)
    {
        return $this->repository->deleteTag($id);
    }
}
