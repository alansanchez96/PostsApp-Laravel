<?php

namespace Src\Common\Traits;

use Illuminate\Support\Facades\Log;

trait Logger
{
    public function catch(string $string): void
    {
        Log::error('error: ' . $string);
    }
}
