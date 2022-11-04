<?php

namespace Src\Tags\Domain\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use Src\Posts\Domain\EloquentRepository\PostEntity;
use Src\Videos\Domain\EloquentRepository\VideoEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagEntity extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to PostEntity::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->morphedByMany(PostEntity::class, 'taggable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to VideoEntity::class
     *
     * @return void
     */
    public function videos()
    {
        return $this->morphedByMany(VideoEntity::class, 'taggable');
    }
}
