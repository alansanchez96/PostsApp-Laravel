<?php

namespace Src\Modules\Blog\Infrastructure\Persistence;

use Database\Factories\PostFactory;
use Src\Common\Interfaces\Laravel\EloquentModel;
use Src\Modules\Blog\Infrastructure\Persistence\Tag;
use Src\Modules\Blog\Infrastructure\Persistence\Category;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;
use Illuminate\Database\Eloquent\Factories\{Factory, HasFactory};
use Illuminate\Database\Eloquent\Relations\{MorphOne, BelongsTo, MorphMany, MorphToMany};

class Post extends EloquentModel
{
    use HasFactory;

    const INACTIVE = 1;
    const ACTIVE = 2;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Asignacion masiva
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'extract',
        'body',
        'status',
        'category_id',
        'user_id'
    ];

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion Uno a Muchos Inversa to CategoryModel::class
     *
     * @return BelongsTo
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relacion Uno a Uno Polimorfica to ImageModel::class
     *
     * @return MorphOne
     */
    // public function image(): MorphOne
    // {
    //     return $this->morphOne(ImageModel::class, 'imageable');
    // }

    /**
     * Relacion Uno a Muchos Polimorfica to CommentModel::class
     *
     * @return MorphMany
     */
    // public function comments(): MorphMany
    // {
    //     return $this->morphMany(CommentModel::class, 'commentable');
    // }

    /**
     * Relacion Muchos a Muchos Polimorfica to TagModel::class
     *
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable', 'taggables', 'taggable_id', 'tag_id');
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return PostFactory::new();
    }
}
