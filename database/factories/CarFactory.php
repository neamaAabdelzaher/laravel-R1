<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'carTitle' => fake()->company(),
            'price' => fake()->randomFloat(),
            'description' => fake()->text(),
            'published' => 1,
            'image' => fake()->imageUrl(800,600),
            
        ];
    }
}
