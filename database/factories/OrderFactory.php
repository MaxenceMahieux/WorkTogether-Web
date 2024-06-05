<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'rack_id' => $this->faker->numberBetween(1, 42),
            'bay_id' => $this->faker->numberBetween(1, 30),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'discount' => $this->faker->numberBetween(0, 100),
            'start_date' => $start = Carbon::now(),
            'end_date' => $start->copy()->addMonths($this->faker->numberBetween(1, 12)),
        ];
    }
}
