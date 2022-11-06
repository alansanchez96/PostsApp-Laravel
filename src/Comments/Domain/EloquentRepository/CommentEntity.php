<?php

namespace Src\Comments\Domain\EloquentRepository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CommentEntityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentEntity extends Model
{
    use HasFactory;

    protected $table = 'comments';

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
     * Relacion Uno a Muchos Inversa Polimorfica
     *
     * @return void
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    protected static function newFactory()
    {
        return CommentEntityFactory::new();
    }
}
