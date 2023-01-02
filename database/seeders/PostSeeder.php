<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Images\Infrastructure\Eloquent\ImageModel;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        $posts = PostModel::factory(50)->create();
        foreach ($posts as $post) {
            ImageModel::factory(1)->create([
                'url' => 'posts/' . fake()->image('public/storage/posts', 640, 480, null, false),
                'imageable_id' => $post->id,
                'imageable_type' => PostModel::class
            ]);
            $post->tags()->attach([
                rand(1, 4),
                rand(4, 8)
            ]);
        }
    }
}
