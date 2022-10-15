<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
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
     * Relacion Uno a Muchos Inversa to Category::class
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
