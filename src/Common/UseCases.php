<?php

namespace Src\Common;

use Src\Common\Traits\Logger;
use Illuminate\Database\Eloquent\Collection;
use Src\Common\Exceptions\EntityNotFoundException;
use Illuminate\Support\Collection as SupportCollection;

abstract class UseCases
{
    use Logger;

    protected function entityNotFound()
    {
        throw new EntityNotFoundException('Entidad no encontrada');
    }

    public function converterToPluck(Collection $collection, string $value, string $key): SupportCollection
    {
        return $collection->pluck($value, $key);
    }
}
