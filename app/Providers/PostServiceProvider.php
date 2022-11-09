<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Posts\Application\GetActivePostsUserCase;
use Src\Posts\Domain\Contracts\PostRepositoryContract;
use Src\Posts\Infrastructure\Eloquent\Repositories\PostRepository;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(GetActivePostsUserCase::class)
            ->needs(PostRepositoryContract::class)
            ->give(PostRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
