<?php

namespace Src\Videos\Domain;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoEntity extends Model
{
    use HasFactory;

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion Uno a Muchos Polimorfica to Comment::class
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany(CommentEntity::class, 'commentable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica to Tag:class
     *
     * @return void
     */
    public function tags()
    {
        return $this->morphToMany(TagEntity::class, 'taggable');
    }
}
