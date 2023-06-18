<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Storage;
use Src\Modules\Blog\Infrastructure\Persistence\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::deleteDirectory('users');
        Storage::makeDirectory('posts');
        Storage::makeDirectory('users');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Category::factory(5)->create();
        $this->call(PostSeeder::class);
    }
}
