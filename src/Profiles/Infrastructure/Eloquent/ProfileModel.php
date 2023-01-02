<?php

namespace Src\Profiles\Infrastructure\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProfileModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * Relacion Uno a Uno to User::class
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function newFactory()
    {
        return ProfileModelFactory::new();
    }
}
