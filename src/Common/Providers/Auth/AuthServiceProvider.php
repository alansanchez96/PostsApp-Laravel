<?php

namespace Src\Common\Providers\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Src\Modules\Auth\Domain\Contracts\IRegisterRepository;
use Src\Modules\Auth\Application\Commands\RegisterUserCommand;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories\RegisterRepository;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IRegisterRepository::class, RegisterRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(base_path('src/Modules/Auth/Infrastructure/Http/router-auth.php'));
        $this->loadRoutesFrom(base_path('src/Presentation/Laravel/Http/router-views.php'));
    }
}
