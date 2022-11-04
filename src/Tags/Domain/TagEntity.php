<?php


use Src\Posts\Domain\PostEntity;
use Src\Videos\Domain\VideoEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagEntity extends Model
{
    use HasFactory;

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to Post::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->morphedByMany(PostEntity::class, 'taggable');
    }

    /**
     * Relacion Muchos a Muchos Polimorfica Inversa to Video::class
     *
     * @return void
     */
    public function videos()
    {
        return $this->morphedByMany(VideoEntity::class, 'taggable');
    }
}
