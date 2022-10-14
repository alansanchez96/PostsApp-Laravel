<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'name' => 'Alan Sanchez',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        Profile::factory(1)->create();
        Category::factory(5)->create();
        Post::factory(2)->create();
    }
}
