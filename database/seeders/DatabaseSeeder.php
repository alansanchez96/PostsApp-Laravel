<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Storage;
use Src\Tags\Domain\EloquentRepository\TagEntity;
use Src\Roles\Domain\EloquentRepository\RoleEntity;
use Src\Comments\Domain\EloquentRepository\CommentEntity;
use Src\Profiles\Domain\EloquentRepository\ProfileEntity;
use Src\Categories\Domain\EloquentRepository\CategoryEntity;

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

        $this->call(UserSeeder::class);
        ProfileEntity::factory(1)->create();
        CategoryEntity::factory(5)->create();
        TagEntity::factory(8)->create();
        $this->call(PostSeeder::class);
        RoleEntity::factory(3)->create();
        CommentEntity::factory(2)->create();
    }
}
