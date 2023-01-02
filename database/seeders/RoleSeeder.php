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

        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$roleAdmin, $roleBlogger]);

        Permission::create(['name' => 'admin.category.index'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.category.create'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.category.edit'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.category.destroy'])->syncRoles([$roleAdmin, $roleBlogger]);

        Permission::create(['name' => 'admin.tag.index'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.tag.create'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.tag.edit'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.tag.destroy'])->syncRoles([$roleAdmin, $roleBlogger]);

        Permission::create(['name' => 'admin.post.index'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.post.create'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.post.edit'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.post.destroy'])->syncRoles([$roleAdmin, $roleBlogger]);
    }
}
