<?php

namespace Src\Comments\Domain;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentEntity extends Model
{
    use HasFactory;

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
}
