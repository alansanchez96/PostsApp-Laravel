<?php

namespace Src\Tags\Infrastructure\Eloquent;

use Database\Factories\TagModelFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Videos\Infrastructure\Eloquent\VideoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'tags';

    protected $guarded = [];

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to PostModel::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->morphedByMany(PostModel::class, 'taggable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to VideoModel::class
     *
     * @return void
     */
    public function videos()
    {
        return $this->morphedByMany(VideoModel::class, 'taggable');
    }

    protected static function newFactory()
    {
        return TagModelFactory::new();
    }
}
