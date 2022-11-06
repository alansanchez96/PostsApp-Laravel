<?php

namespace Src\Permissions\Domain\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use Src\Roles\Domain\EloquentRepository\RoleEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionEntity extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * Relacion Muchos a Muchos to RoleEntity::class
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(RoleEntity::class);
    }
}
