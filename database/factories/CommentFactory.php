<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence(),
            'commentable_id' => 1,
            'commentable_type' => $this->faker->randomElement([Post::class, Video::class]),
            'user_id' => 1
        ];
    }
}
