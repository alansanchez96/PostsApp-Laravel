<?php

namespace Src\Tags\Application;

use Illuminate\Support\Collection;
use Src\Tags\Domain\Contract\TagRepositoryContract;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class GetAllTagsUseCase
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
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return EloquentCollection|Collection
     */
    public function execute(bool $pluck = false, string $column = null, mixed $key = null): EloquentCollection|Collection
    {
        return $this->repository->getAllTags($pluck, $column, $key);
    }
}
