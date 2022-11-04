<?php

namespace Src\Roles\Domain\EloquentRepository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Permissions\Domain\EloquentRepository\PermissionEntity;

class RoleEntity extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Relacion Muchos a Muchos to User::class
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Relacion Mucho a Muchos to PermissionEntity::class
     *
     * @return void
     */
    public function permissions()
    {
        return $this->belongsToMany(PermissionEntity::class);
    }
}
