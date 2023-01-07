<?php

namespace Src\Tags\Application;

use Src\Tags\Domain\Contract\TagRepositoryContract;

class SaveTagUseCase
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
     * Recibe el request por separado y almacena los registros
     *
     * @param mixed $reqName
     * @param mixed $reqSlug
     * @param mixed $reqColor
     * @param integer|null $id
     * @return void
     */
    public function execute($reqName, $reqSlug, $reqColor, ?int $id = null)
    {
        return $this->repository->save($reqName, $reqSlug, $reqColor, $id);
    }
}
