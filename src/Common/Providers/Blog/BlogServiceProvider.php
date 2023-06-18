<?php

namespace Src\Common\Providers\Blog;

use Illuminate\Support\ServiceProvider;
use Src\Modules\Blog\Domain\Contracts\IPostRepository;
use Src\Modules\Blog\Infrastructure\Persistence\Eloquent\PostRepository;

class BlogServiceProvider extends ServiceProvider 
{
    public function register()
    {
        $this->app->bind(IPostRepository::class, PostRepository::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(base_path('src/Modules/Blog/Infrastructure/Http/router.php'));
    }
}