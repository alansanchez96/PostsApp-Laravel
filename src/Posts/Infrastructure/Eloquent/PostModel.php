<?php

namespace Src\Posts\Infrastructure\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\PostModelFactory;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Images\Infrastructure\Eloquent\ImageModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Comments\Infrastructure\Eloquent\CommentModel;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Src\Categories\Infrastructure\Eloquent\CategoryModel;


class PostModel extends Model
{
    use HasFactory;

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
    protected $guarded = [];

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
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    /**
     * Relacion Uno a Uno Polimorfica to ImageModel::class
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(ImageModel::class, 'imageable');
    }

    /**
     * Relacion Uno a Muchos Polimorfica to CommentModel::class
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(CommentModel::class, 'commentable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica to TagModel::class
     *
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(TagModel::class, 'taggable', 'taggables', 'taggable_id', 'tag_id');
    }

    /**
     * Se vincula con el factory
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return PostModelFactory::new();
    }
}
