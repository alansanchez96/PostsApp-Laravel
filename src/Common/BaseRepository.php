<?php

namespace Src\Common;

use Src\Common\Traits\{
    Hasher,
    Logger,
    Converter
};

abstract class BaseRepository
{
    use Hasher, Converter, Logger;
}
