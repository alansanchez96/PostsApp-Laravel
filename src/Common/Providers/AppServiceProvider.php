<?php

namespace Src\Common\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if ($this->app->environment('production')) {
        //     URL::forceScheme('https');
        // }
        LogViewer::auth(function ($request) {
            return $request->user() && in_array($request->user()->email, ['alaansannchezz@admin.com',]);
        });
    }
}
