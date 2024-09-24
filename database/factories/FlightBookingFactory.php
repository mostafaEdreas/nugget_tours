<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlightBooking>
 */
class FlightBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name, // Generates a random word (e.g., product name)
            'email' => $this->faker->email(), // Generates a random city name for the departure city
            'passwor' => Hash::make('123456'), // Generates a random city name for the destination city
            
        ];
    }
}
