<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shift>
 */
class ShiftFactory extends Factory
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
            'description' => $this->faker->sentence,
            'min_start' => $this->faker->time('H:i'),
            'start' => $this->faker->time('H:i'),
            'max_start' => $this->faker->time('H:i'),
            'min_end' => $this->faker->time('H:i'),
            'end' => $this->faker->time('H:i'),
            'max_end' => $this->faker->time('H:i'),
            'break_time' => $this->faker->numberBetween(15, 60),
            'days' => $this->faker->randomElements(['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'], $this->faker->numberBetween(1, 7)),
            'recurring' => $this->faker->boolean,
            'repeat_week' => $this->faker->numberBetween(1,56),
            'endson' => $this->faker->optional()->date(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
