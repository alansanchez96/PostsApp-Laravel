<?php

namespace Src\Modules\Auth\Infrastructure\Persistence\Eloquent;

use Laravel\Sanctum\HasApiTokens;
use Database\Factories\UserFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Src\Modules\Blog\Infrastructure\Persistence\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\{Factory, HasFactory};
use Illuminate\Database\Eloquent\Relations\{HasOne, HasMany, MorphOne};

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'code'
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
     * @return HasOne
     */
    // public function profile(): HasOne
    // {
    //     return $this->hasOne(ProfileModel::class);
    // }

    /**
     * Relacion Uno a Muchos to PostModel::class
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Relacion Uno a Muchos to VideoModel::class
     *
     * @return HasMany
     */
    // public function videos(): HasMany
    // {
    //     return $this->hasMany(VideoModel::class);
    // }

    /**
     * Relacion Uno a Uno Polimorfica
     *
     * @return MorphOne
     */
    // public function image(): MorphOne
    // {
    //     return $this->morphOne(ImageModel::class, 'imageable');
    // }

    /**
     * Relacion Uno a Muchos to CommentModel::class
     *
     * @return hasMany
     */
    // public function comment(): hasMany
    // {
    //     return $this->hasMany(CommentModel::class);
    // }

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
