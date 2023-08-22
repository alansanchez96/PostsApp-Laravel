<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Nucleo extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        \Illuminate\Http\Middleware\HandleCors::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        // \Src\Common\Middlewares\TrustHosts::class,
        \Src\Common\Middlewares\TrustProxies::class,
        \Src\Common\Middlewares\PreventRequestsDuringMaintenance::class,
        \Src\Common\Middlewares\TrimStrings::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth.basic'        => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session'      => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers'     => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'               => \Illuminate\Auth\Middleware\Authorize::class,
        'password.confirm'  => \Illuminate\Auth\Middleware\RequirePassword::class,
        'throttle'          => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'auth'              => \Src\Common\Middlewares\Authenticate::class,
        'guest'             => \Src\Common\Middlewares\RedirectIfAuthenticated::class,
        'verified'          => \Src\Common\Middlewares\EnsureEmailIsVerified::class,
    ];
}
