<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Posts\Domain\EloquentRepository\PostEntity;
use Src\Videos\Domain\EloquentRepository\VideoEntity;
use Src\Comments\Domain\EloquentRepository\CommentEntity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentEntityFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = CommentEntity::class;

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
            'commentable_type' => $this->faker->randomElement([PostEntity::class, VideoEntity::class]),
            'user_id' => User::all()->random()->id
        ];
    }
}
