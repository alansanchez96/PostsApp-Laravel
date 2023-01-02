<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Src\Images\Infrastructure\Eloquent\ImageModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador Publico',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ])->assignRole('admin');

        /* $users = User::factory(20)->create();
        foreach ($users as $user) {
            ImageModel::factory(1)->create([
                'url' => 'users/' . fake()->image('public/storage/users', 640, 480, null, false),
                'imageable_id' => $user->id,
                'imageable_type' => User::class
            ]);
        } */
    }
}
