<?php

namespace Src\Common\Observers;

use Illuminate\Support\Facades\App;
use Src\Modules\Blog\Infrastructure\Persistence\Post;

class PostObserver
{
    /**
     * Antes de crear un Post verifica que el autor del post sea igual al usuario autenticado
     *
     * @param Post $post
     * @return void
     */
    public function creating(Post $post): void
    {
        if (!App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }
}
