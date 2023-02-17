<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'date' => $this->faker->dateTimeBetween(now(), '+1 month'),
            'created_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
