<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to Post::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to Video::class
     *
     * @return void
     */
    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
