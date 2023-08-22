<?php

namespace Src\Common\Interfaces\Laravel;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Src\Common\Traits\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, JsonResponse;
}
