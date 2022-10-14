<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Desarrollador',
            'biography' => 'Esta es la biografia de relleno',
            'website' => 'portfolio-alansan.epizy.com',
            'user_id' => 1
        ];
    }
}
