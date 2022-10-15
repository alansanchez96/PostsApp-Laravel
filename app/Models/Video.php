<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    /**
     * Relacion Uno a Muchos Inversa to User::class
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
