<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Profiles\Domain\EloquentRepository\ProfileEntity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileEntityFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = ProfileEntity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->word(),
            'biography' => $this->faker->unique()->sentence(),
            'website' => $this->faker->url(),
            'user_id' => User::all()->random()->id
        ];
    }
}
