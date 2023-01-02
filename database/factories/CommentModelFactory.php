<?php

namespace Database\Factories;

use App\Models\User;
use Src\Posts\Infrastructure\Eloquent\PostModel;
use Src\Videos\Infrastructure\Eloquent\VideoModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Comments\Infrastructure\Eloquent\CommentModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentModelFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = CommentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->unique()->sentence(),
            'commentable_id' => 1,
            'commentable_type' => $this->faker->randomElement([PostModel::class, VideoModel::class]),
            'user_id' => User::all()->random()->id
        ];
    }
}
