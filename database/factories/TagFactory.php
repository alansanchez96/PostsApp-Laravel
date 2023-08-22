<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Modules\Blog\Infrastructure\Persistence\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Src\Modules\Blog\Infrastructure\Persistence\Tag>
 */
class TagFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = Tag::class;

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
