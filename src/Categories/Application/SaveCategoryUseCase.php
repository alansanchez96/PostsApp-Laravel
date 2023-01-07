<?php

namespace Src\Categories\Application;

use Src\Categories\Domain\Contracts\CategoryRepositoryContract;

class SaveCategoryUseCase
{
    /**
     * Repository property
     *
     * @var CategoryRepository
     */
    protected $repository;

    public function __construct(CategoryRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Recibe el request por separado y almacena los registros.
     *
     * @param $reqName
     * @param $reqSlug
     * @param integer|null $id
     * @return void
     */
    public function execute($reqName, $reqSlug, int $id = null)
    {
        return $this->repository->save($reqName, $reqSlug, $id);
    }
}
