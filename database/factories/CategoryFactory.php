<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Modules\Blog\Infrastructure\Persistence\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Src\Modules\Blog\Infrastructure\Persistence\Category>
 */
class CategoryFactory extends Factory
{

    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = Category::class;

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
