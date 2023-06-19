<?php

namespace Src\Common\Providers\Blog;

use Illuminate\Support\ServiceProvider;
use Src\Modules\Blog\Domain\Contracts\{ICategoryRepository, IPostRepository};
use Src\Modules\Blog\Infrastructure\Persistence\Eloquent\{CategoryRepository, PostRepository};

class BlogServiceProvider extends ServiceProvider 
{
    public function register()
    {
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(base_path('src/Modules/Blog/Infrastructure/Http/router.php'));
    }
}