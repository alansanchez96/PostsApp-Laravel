<?php

namespace Src\Posts\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostEntity extends Model
{
    use HasFactory;

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion Uno a Muchos Inversa to Category::class
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relacion Uno a Uno Polimorfica to Image::class
     *
     * @return void
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Relacion Uno a Muchos Polimorfica to Comment::class
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica to Tag:class
     *
     * @return void
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
