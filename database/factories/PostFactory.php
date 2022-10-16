<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->name();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'extract' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'user_id' => 1
        ];
    }
}
