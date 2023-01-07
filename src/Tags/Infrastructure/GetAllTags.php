<?php

namespace Src\Tags\Infrastructure;

use Illuminate\Support\Collection;
use Src\Tags\Application\GetAllTagsUseCase;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class GetAllTags
{
    /**
     * Use case GetAllTags
     *
     * @var GetAllTagsUseCase
     */
    protected $getAllTags;

    public function __construct(GetAllTagsUseCase $getAllTags)
    {
        $this->getAllTags = $getAllTags;
    }

    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return EloquentCollection|Collection
     */
    public function getAllTags(bool $pluck = false, string $column = null, mixed $key = null): EloquentCollection|Collection
    {
        return $this->getAllTags->execute($pluck, $column, $key);
    }
}
