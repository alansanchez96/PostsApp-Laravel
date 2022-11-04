<?php

namespace Src\Posts\Domain\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Categories\Domain\EloquentRepository\CategoryEntity;
use Src\Comments\Domain\EloquentRepository\CommentEntity;
use Src\Images\Domain\EloquentRepository\ImageEntity;
use Src\Tags\Domain\EloquentRepository\TagEntity;

class PostEntity extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'posts';

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
     * Relacion Uno a Muchos Inversa to CategoryEntity::class
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsTo(CategoryEntity::class);
    }

    /**
     * Relacion Uno a Uno Polimorfica to ImageEntity::class
     *
     * @return void
     */
    public function image()
    {
        return $this->morphOne(ImageEntity::class, 'imageable');
    }

    /**
     * Relacion Uno a Muchos Polimorfica to CommentEntity::class
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany(CommentEntity::class, 'commentable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica to TagEntity::class
     *
     * @return void
     */
    public function tags()
    {
        return $this->morphToMany(TagEntity::class, 'taggable');
    }
}
