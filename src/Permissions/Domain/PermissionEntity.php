<?php

namespace Src\Permissions\Domain;

use Src\Roles\Domain\RoleEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermissionEntity extends Model
{
    use HasFactory;

    /**
     * Relacion Muchos a Muchos to Role::class
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(RoleEntity::class);
    }
}
