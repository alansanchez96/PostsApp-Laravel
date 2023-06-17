<?php

namespace Src\Modules\Blog\Infrastructure\Persistence;

use Database\Factories\CategoryFactory;
use Src\Common\Interfaces\Laravel\EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Modules\Blog\Infrastructure\Persistence\Post;
use Illuminate\Database\Eloquent\Factories\{Factory, HasFactory};

class Category extends EloquentModel
{
    use HasFactory;

    /**
     * Tabla del Model
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Almacenamiento masivo
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * Relacion Uno a Muchos to PostModel::class
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CategoryFactory::new();
    }
}
