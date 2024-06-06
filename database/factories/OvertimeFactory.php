<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Overtime>
 */
class OvertimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'rate_type' => $this->faker->randomElement(['daily', 'hourly']),
            'rate' => $this->faker->numberBetween(1, 10), // Assuming rate as a percentage of salary
        ];
    }
}
