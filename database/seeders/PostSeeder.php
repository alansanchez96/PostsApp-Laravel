<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Posts\Domain\EloquentRepository\PostEntity;
use Src\Images\Domain\EloquentRepository\ImageEntity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = PostEntity::factory(25)->create();
        foreach ($posts as $post) {
            ImageEntity::factory(1)->create([
                'url' => 'posts/' . fake()->image('public/storage/posts', 640, 480, null, false),
                'imageable_id' => $post->id,
                'imageable_type' => PostEntity::class
            ]);
            $post->tags()->attach([
                rand(1, 4),
                rand(4, 8)
            ]);
        }
    }
}
