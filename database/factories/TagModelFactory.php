<?php

namespace Database\Factories;

use Src\Tags\Infrastructure\Eloquent\TagModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagModelFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = TagModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();
        return [
            'name' => $name,
            'slug' => $name,
            'color' => $this->faker->randomElement(['red', 'blue', 'yellow', 'indigo', 'purple', 'green'])
        ];
    }
}
