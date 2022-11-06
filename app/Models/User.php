<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Src\Posts\Domain\EloquentRepository\PostEntity;
use Src\Roles\Domain\EloquentRepository\RoleEntity;
use Src\Images\Domain\EloquentRepository\ImageEntity;
use Src\Videos\Domain\EloquentRepository\VideoEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Src\Comments\Domain\EloquentRepository\CommentEntity;
use Src\Profiles\Domain\EloquentRepository\ProfileEntity;

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
     * Relacion Uno a Uno to ProfileEntity::class
     *
     * @return void
     */
    public function profile()
    {
        return $this->hasOne(ProfileEntity::class);
    }

    /**
     * Relacion Uno a Muchos to PostEntity::class
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(PostEntity::class);
    }

    /**
     * Relacion Uno a Muchos to VideoEntity::class
     *
     * @return void
     */
    public function videos()
    {
        return $this->hasMany(VideoEntity::class);
    }

    /**
     * Relacion Muchos a Muchos to RoleEntity::class
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(RoleEntity::class);
    }

    /**
     * Relacion Uno a Uno Polimorfica
     *
     * @return void
     */
    public function image()
    {
        return $this->morphOne(ImageEntity::class, 'imageable');
    }

    /**
     * Relacion Uno a Muchos to CommentEntity::class
     *
     * @return void
     */
    public function comment()
    {
        return $this->hasMany(CommentEntity::class);
    }
}
