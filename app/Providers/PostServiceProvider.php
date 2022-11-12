<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Posts\Application\GetActivePostsUseCase;
use Src\Posts\Application\GetCategoryPostUseCase;
use Src\Posts\Application\GetPostUseCase;
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
        $this->app->when(GetActivePostsUseCase::class)
            ->needs(PostRepositoryContract::class)
            ->give(PostRepository::class);
        $this->app->when(GetPostUseCase::class)
            ->needs(PostRepositoryContract::class)
            ->give(PostRepository::class);
        $this->app->when(GetCategoryPostUseCase::class)
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
