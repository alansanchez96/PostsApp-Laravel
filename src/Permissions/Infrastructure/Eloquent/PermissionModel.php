<?php

namespace Src\Permissions\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Src\Roles\Infrastructure\Eloquent\RoleModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionModel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla entidad
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * Relacion Muchos a Muchos to RoleModel::class
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(RoleModel::class);
    }
}
