<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Role;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Factories\RoleUserFactory;
use Illuminate\Support\Facades\Storage;

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
        Storage::makeDirectory('posts');

        $this->call(UserSeeder::class);
        Profile::factory(1)->create();
        Category::factory(5)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
        Role::factory(3)->create();
        Comment::factory(2)->create();
    }
}
