<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Shared\Models\ImageShared;
use Src\Modules\Blog\Infrastructure\Persistence\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(50)->create();
        foreach ($posts as $post) {
            ImageShared::factory(1)->create([
                'url'               => 'posts/' . fake()->image('public/storage/posts', 640, 480, null, false),
                'imageable_id'      => $post->id,
                'imageable_type'    => Post::class
            ]);

            $post->tags()->attach([
                rand(1, 4),
                rand(4, 8)
            ]);
        }
    }
}
