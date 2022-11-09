<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Categories\Infrastructure\Eloquent\CategoryModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostModelFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = PostModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(10);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1, 2]),
            'category_id' => CategoryModel::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
