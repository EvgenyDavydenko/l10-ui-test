<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'article' => $this->faker->unique()->word(),
            'name' => $this->faker->name(),
            'status' => $this->faker->randomElement($array = ['available', 'unavailable']),
            'properties' => [
                'color' => $this->faker->colorName(),
                'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            ],
        ];
    }
}
