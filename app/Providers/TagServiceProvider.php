<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Tags\Application\GetTagUseCase;
use Src\Tags\Application\SaveTagUseCase;
use Src\Tags\Application\DeleteTagUseCase;
use Src\Tags\Application\GetAllTagsUseCase;
use Src\Tags\Domain\Contract\TagRepositoryContract;
use Src\Tags\Application\GetPostsRelatedToTagsUseCase;
use Src\Tags\Infrastructure\Eloquent\Repositories\TagRepository;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(GetPostsRelatedToTagsUseCase::class)
            ->needs(TagRepositoryContract::class)
            ->give(TagRepository::class);
        $this->app->when(GetAllTagsUseCase::class)
            ->needs(TagRepositoryContract::class)
            ->give(TagRepository::class);
        $this->app->when(SaveTagUseCase::class)
            ->needs(TagRepositoryContract::class)
            ->give(TagRepository::class);
        $this->app->when(GetTagUseCase::class)
            ->needs(TagRepositoryContract::class)
            ->give(TagRepository::class);
        $this->app->when(DeleteTagUseCase::class)
            ->needs(TagRepositoryContract::class)
            ->give(TagRepository::class);
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
