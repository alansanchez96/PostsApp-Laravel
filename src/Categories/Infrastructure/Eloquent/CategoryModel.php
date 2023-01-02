<?php

namespace Src\Categories\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\CategoryModelFactory;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = [];

    /**
     * Relacion Uno a Muchos to PostModel::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(PostModel::class);
    }

    protected static function newFactory()
    {
        return CategoryModelFactory::new();
    }
}
