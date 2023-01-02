<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Src\Posts\Infrastructure\Eloquent\PostModel;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function author(User $user, PostModel $post)
    {
        return $post->user_id == $user->id ?
            Response::allow() :
            Response::deny('No autorizado');
    }

    public function published(?User $user, PostModel $post)
    {
        return $post->status === '2' ?
            Response::allow() :
            Response::deny('Publicación no disponible');
    }
}
