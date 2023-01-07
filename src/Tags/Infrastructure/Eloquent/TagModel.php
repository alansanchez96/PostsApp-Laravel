<?php

namespace Src\Tags\Infrastructure\Eloquent;

use Database\Factories\TagModelFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Videos\Infrastructure\Eloquent\VideoModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class TagModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Agregacion masiva
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to PostModel::class
     *
     * @return MorphToMany
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(PostModel::class, 'taggable', null, 'tag_id');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to VideoModel::class
     *
     * @return MorphToMany
     */
    public function videos(): MorphToMany
    {
        return $this->morphedByMany(VideoModel::class, 'taggable');
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TagModelFactory::new();
    }
}
