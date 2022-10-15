<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * Relacion Muchos a Muchos to User::class
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
