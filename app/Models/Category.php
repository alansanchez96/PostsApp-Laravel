<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * Relacion Uno a Muchos to Post::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
