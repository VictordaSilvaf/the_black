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
    public function definition()
    {
        return [
            'name' => $this->faker->text,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'image' => $this->faker->imageUrl,
            'quantity' => $this->faker->numberBetween(1, 3),
            'type' => $this->faker->randomElement(['product', 'subscription']),
        ];
    }
}
