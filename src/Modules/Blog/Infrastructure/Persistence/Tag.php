<?php

namespace Src\Modules\Blog\Infrastructure\Persistence;

use Database\Factories\TagFactory;
use Src\Common\Interfaces\Laravel\EloquentModel;
use Src\Modules\Blog\Infrastructure\Persistence\Post;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Factories\{Factory, HasFactory};

class Tag extends EloquentModel
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
        return $this->morphedByMany(Post::class, 'taggable', null, 'tag_id');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to VideoModel::class
     *
     * @return MorphToMany
     */
    // public function videos(): MorphToMany
    // {
    //     return $this->morphedByMany(VideoModel::class, 'taggable');
    // }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return TagFactory::new();
    }
}
