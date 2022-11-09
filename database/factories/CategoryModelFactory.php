<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Categories\Infrastructure\Eloquent\CategoryModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryModelFactory extends Factory
{

    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = CategoryModel::class;

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
