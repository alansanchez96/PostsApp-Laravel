<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Categories\Domain\EloquentRepository\CategoryEntity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryEntityFactory extends Factory
{

    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = CategoryEntity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
