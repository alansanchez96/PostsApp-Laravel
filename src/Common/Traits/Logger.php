<?php

namespace Src\Common\Traits;

use Illuminate\Support\Facades\Log;

trait Logger
{
    public function catch(string $message, bool $abort = false): void
    {
        Log::error('error: ' . $message);

        !$abort ?: abort(404);
    }
}
