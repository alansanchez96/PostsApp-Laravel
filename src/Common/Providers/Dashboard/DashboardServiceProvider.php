<?php

namespace Src\Common\Providers\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function register() { }

    public function boot()
    {
        $this->loadRoutesFrom(base_path('src/Modules/Blog/Infrastructure/Http/router_dashboard.php'));
    }
}
