<?php

namespace Src\Categories\Domain;

use Src\Posts\Domain\PostEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryEntity extends Model
{
    use HasFactory;

    /**
     * Relacion Uno a Muchos to Post::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(PostEntity::class);
    }
}
