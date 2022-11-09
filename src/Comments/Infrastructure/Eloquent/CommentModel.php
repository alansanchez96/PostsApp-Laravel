<?php

namespace Src\Comments\Infrastructure\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CommentModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentModel extends Model
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
        return CommentModelFactory::new();
    }
}
