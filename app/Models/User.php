<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Images\Infrastructure\Eloquent\ImageModel;
use Src\Videos\Infrastructure\Eloquent\VideoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Comments\Infrastructure\Eloquent\CommentModel;
use Src\Profiles\Infrastructure\Eloquent\ProfileModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        'email_verified_at'
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
     * Relacion Uno a Uno to ProfileModel::class
     *
     * @return void
     */
    public function profile()
    {
        return $this->hasOne(ProfileModel::class);
    }

    /**
     * Relacion Uno a Muchos to PostModel::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(PostModel::class);
    }

    /**
     * Relacion Uno a Muchos to VideoModel::class
     *
     * @return void
     */
    public function videos()
    {
        return $this->hasMany(VideoModel::class);
    }

    /**
     * Relacion Uno a Uno Polimorfica
     *
     * @return void
     */
    public function image()
    {
        return $this->morphOne(ImageModel::class, 'imageable');
    }

    /**
     * Relacion Uno a Muchos to CommentModel::class
     *
     * @return void
     */
    public function comment()
    {
        return $this->hasMany(CommentModel::class);
    }
}
