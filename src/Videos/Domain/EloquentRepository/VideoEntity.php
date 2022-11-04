<?php

namespace Src\Videos\Domain\EloquentRepository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Src\Tags\Domain\EloquentRepository\TagEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Comments\Domain\EloquentRepository\CommentEntity;

class VideoEntity extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'videos';

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
