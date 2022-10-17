<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Tag;
use Database\Factories\RoleUserFactory;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        Profile::factory(1)->create();
        Category::factory(5)->create();
        $this->call(PostSeeder::class);
        Role::factory(3)->create();
        Comment::factory(2)->create();
        Tag::factory(2)->create();
    }
}
