<?php

namespace Src\Common;

use Src\Common\Traits\Logger;
use Src\Common\Exceptions\EntityNotFoundException;

abstract class UseCases
{
    use Logger;

    protected function entityNotFound()
    {
        throw new EntityNotFoundException('Entidad no encontrada');
    }
}
