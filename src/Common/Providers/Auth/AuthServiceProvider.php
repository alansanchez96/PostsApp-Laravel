<?php

namespace Src\Common\Providers\Auth;

use Illuminate\Support\ServiceProvider;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\Repositories\{
    LoginRepository,
    PasswordRepository,
    RegisterRepository,
    ProfileRepository
};
use Src\Modules\Auth\Domain\Contracts\{
    ILoginRepository,
    IPasswordRepository,
    IRegisterRepository,
    IProfileRepository
};

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
        $this->app->bind(ILoginRepository::class, LoginRepository::class);
        $this->app->bind(IPasswordRepository::class, PasswordRepository::class);
        $this->app->bind(IProfileRepository::class, ProfileRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(base_path('src/Modules/Auth/Infrastructure/Http/router_auth.php'));
        $this->loadRoutesFrom(base_path('src/Presentation/Laravel/Http/router_views.php'));
    }
}
