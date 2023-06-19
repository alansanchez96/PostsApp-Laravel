<?php

namespace Src\Common\Traits;

use Illuminate\Support\Facades\Log;

trait Logger
{
    public function catch(string $message): void
    {
        Log::error('error: ' . $message);

        abort(404);
    }
}
