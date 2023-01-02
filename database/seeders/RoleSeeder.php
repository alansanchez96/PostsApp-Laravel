<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleBlogger = Role::create(['name' => 'blogger']);

        Permission::create([
            'name' => 'admin.dashboard',
            'description' => 'Acceso dashboard'
        ])->syncRoles([$roleAdmin, $roleBlogger]);

        Permission::create([
            'name' => 'admin.user.index',
            'description' => 'Acceso listado de usuarios'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'admin.user.edit',
            'description' => 'Permiso de asignacion de rol a usuario'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'admin.user.update',
            'description' => 'Permiso de guardar rol de usuario'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.category.index',
            'description' => 'Acceso listado de categorias'
        ])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create([
            'name' => 'admin.category.create',
            'description' => 'Permiso de creación de nueva categoria'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'admin.category.edit',
            'description' => 'Permiso de editar categoria existente'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'admin.category.destroy',
            'description' => 'Permiso de eliminar categoria existente'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.tag.index',
            'description' => 'Acceso listado de etiquetas'
        ])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create([
            'name' => 'admin.tag.create',
            'description' => 'Permiso de creación de nueva etiqueta'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'admin.tag.edit',
            'description' => 'Permiso de editar etiqueta existente'
        ])->syncRoles([$roleAdmin]);
        Permission::create([
            'name' => 'admin.tag.destroy',
            'description' => 'Permiso de eliminar etiqueta existente'
        ])->syncRoles([$roleAdmin]);

        Permission::create([
            'name' => 'admin.post.index',
            'description' => 'Permiso de ver listado de posts'
        ])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create([
            'name' => 'admin.post.create',
            'description' => 'Permiso para crear nuevo post'
        ])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create([
            'name' => 'admin.post.edit',
            'description' => 'Permiso de actualizar un post existente'
        ])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create([
            'name' => 'admin.post.destroy',
            'description' => 'Permiso de eliminar post existente'
        ])->syncRoles([$roleAdmin, $roleBlogger]);
    }
}
