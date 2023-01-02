<?php

namespace Src\Videos\Infrastructure\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Comments\Infrastructure\Eloquent\CommentModel;

class VideoModel extends Model
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
     * Relacion Uno a Muchos Polimorfica to CommentModel::class
     *
     * @return void
     */
    public function comments()
    {
        return $this->morphMany(CommentModel::class, 'commentable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica to TagModel::class
     *
     * @return void
     */
    public function tags()
    {
        return $this->morphToMany(TagModel::class, 'taggable');
    }
}
