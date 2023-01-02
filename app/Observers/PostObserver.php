<?php

namespace App\Observers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Src\Posts\Infrastructure\Eloquent\PostModel;

class PostObserver
{
    public function creating(PostModel $post)
    {
        if (!App::runningInConsole()) {
            $post->user_id = auth()->user()->id;
        }
    }

    public function deleting(PostModel $post)
    {
        if ($post->image) {
            Storage::delete($post->image->url);
        }
    }
}
