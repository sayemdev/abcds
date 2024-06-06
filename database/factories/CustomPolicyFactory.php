<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomPolicy>
 */
class CustomPolicyFactory extends Factory
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
            'employee_ids' => $this->faker->randomElements([1, 2, 3, 4, 5], rand(1, 5)), // or $this->faker->randomElements([1, 2, 3, 4, 5], rand(1, 5)),
        ];
    }
}
