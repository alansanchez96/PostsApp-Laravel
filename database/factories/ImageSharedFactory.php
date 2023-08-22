<?php

namespace Database\Factories;

use Src\Shared\Models\ImageShared;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageSharedFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = ImageShared::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [];
    }
}
