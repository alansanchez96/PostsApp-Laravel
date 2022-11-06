<?php

namespace Src\Profiles\Domain\EloquentRepository;

use App\Models\User;
use Database\Factories\ProfileEntityFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileEntity extends Model
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
        return ProfileEntityFactory::new(); 
    }
}
