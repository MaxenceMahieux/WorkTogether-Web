<?php

namespace Database\Factories;

use App\Models\Bay;
use Illuminate\Database\Eloquent\Factories\Factory;

class BayFactory extends Factory
{
    /**
     * The starting number for the bay names.
     */
    private static $counter = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bayNumber = str_pad(self::$counter++, 3, '0', STR_PAD_LEFT);
        return [
            'bay_name' => 'B' . $bayNumber,
        ];
    }
}
