<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Image;
use App\Models\Video;
use App\Models\Profile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relacion Uno a Uno to Profile::class
     *
     * @return void
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Relacion Uno a Muchos to Post::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relacion Uno a Muchos to Video::class
     *
     * @return void
     */
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    /**
     * Relacion Muchos a Muchos to Role::class
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Relacion Uno a Uno Polimorfica
     *
     * @return void
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Relacion Uno a Muchos to Comment::class
     *
     * @return void
     */
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
