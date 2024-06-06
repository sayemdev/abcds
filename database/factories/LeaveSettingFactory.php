<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveSetting>
 */
class LeaveSettingFactory extends Factory
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
            'days' => $this->faker->numberBetween(1, 30),
            'paid' => $this->faker->boolean,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'max' => $this->faker->optional()->numberBetween(1, 15),
        ];
    }
}
