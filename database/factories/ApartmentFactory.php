<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $fake()->words(3, true),
            'description' => $fake()->words(10, true),
            'rooms' => $fake()->numberBetween(1, 5),
            'beds' => $fake()->numberBetween(1, 5),
            'bathrooms' => $fake()->numberBetween(1, 5),
            'squareMeters' => $fake()->numberBetween(30, 100),
            'address' => $fake()->city(),
            'latitude' => $fake()->random . uniform(-90, 90),
            'longitude' => $fake()->random . uniform(-180, 180),
            'image' => $fake()->imageUrl(640, 480, 'Apartment', true),
            'icon' => $fake()->boolean(),
        ];
    }
}
