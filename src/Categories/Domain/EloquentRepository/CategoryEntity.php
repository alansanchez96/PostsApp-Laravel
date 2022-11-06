<?php

namespace Src\Categories\Domain\EloquentRepository;

use Src\Posts\Domain\PostEntity;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CategoryEntityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryEntity extends Model
{
    use HasFactory;

    protected $table = 'categories';

    /**
     * Relacion Uno a Muchos to PostEntity::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(PostEntity::class);
    }

    protected static function newFactory()
    {
        return CategoryEntityFactory::new();
    }
}
