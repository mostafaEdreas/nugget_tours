<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Generates a random word (e.g., product name)
            'from_city' => $this->faker->city, // Generates a random city name for the departure city
            'to_city' => $this->faker->city, // Generates a random city name for the destination city
            'trip_date' => '2024-10-' . str_pad(rand(1, 31), 2, '0', STR_PAD_LEFT), // Random date in October 2024
            'trip_time' => sprintf('%02d:00:00', rand(0, 23)), // Random hour in 24-hour format
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
