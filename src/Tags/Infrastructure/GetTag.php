<?php

namespace Src\Tags\Infrastructure;

use Illuminate\Database\Eloquent\Model;
use Src\Tags\Application\GetTagUseCase;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GetTag
{
    /**
     * Use case GetTag
     *
     * @var GetTagUseCase
     */
    protected $getTag;

    public function __construct(GetTagUseCase $getTag)
    {
        $this->getTag = $getTag;
    }
/**
     * Obtiene el Model Tag y devuelve el Model consultado
     *
     * @param mixed $tag
     * @return Model|EloquentCollection|Builder
     */
    public function getTag(mixed $tag): Model|Collection|Builder
    {
        return $this->getTag->execute($tag);
    }
}
