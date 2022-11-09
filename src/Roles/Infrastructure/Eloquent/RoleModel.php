<?php

namespace Src\Roles\Infrastructure\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\RoleModelFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Permissions\Infrastructure\Eloquent\PermissionModel;

class RoleModel extends Model
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
     * Relacion Mucho a Muchos to PermissionModel::class
     *
     * @return void
     */
    public function permissions()
    {
        return $this->belongsToMany(PermissionModel::class);
    }

    protected static function newFactory()
    {
        return RoleModelFactory::new();
    }
}
