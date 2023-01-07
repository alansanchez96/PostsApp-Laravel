<?php

namespace Src\Categories\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\CategoryModelFactory;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryModel extends Model
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
    protected $guarded = [];

    /**
     * Relacion Uno a Muchos to PostModel::class
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(PostModel::class);
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CategoryModelFactory::new();
    }
}
