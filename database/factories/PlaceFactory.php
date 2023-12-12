<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
            return [
                'title' => fake()->company(),
                'description' => fake()->text(),
                'priceFrom' => fake()->randomFloat(),
                'priceTo' => fake()->randomFloat(),
                'image' => fake()->imageUrl(800,600),
                
            ];
       
    }
}
