<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Categories\Application\GetAllCategoriesUseCase;
use Src\Categories\Domain\Contracts\CategoryRepositoryContract;
use Src\Categories\Infrastructure\Eloquent\Repositories\CategoryRepository;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(GetAllCategoriesUseCase::class)
            ->needs(CategoryRepositoryContract::class)
            ->give(CategoryRepository::class);
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
