<?php

namespace Src\Posts\Infrastructure\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\PostModelFactory;
use Src\Tags\Infrastructure\Eloquent\TagModel;
use Src\Images\Infrastructure\Eloquent\ImageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Comments\Infrastructure\Eloquent\CommentModel;
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

    protected $guarded = [];

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacion Uno a Muchos Inversa to CategoryModel::class
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    /**
     * Relacion Uno a Uno Polimorfica to ImageModel::class
     *
     * @return void
     */
    public function image()
    {
        return $this->morphOne(ImageModel::class, 'imageable');
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
        return $this->morphToMany(TagModel::class, 'taggable', 'taggables', 'taggable_id', 'tag_id');
    }

    protected static function newFactory()
    {
        return PostModelFactory::new();
    }
}
