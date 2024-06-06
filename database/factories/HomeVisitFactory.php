<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeVisit>
 */
class HomeVisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => $this->faker->randomNumber(),
            'lat' => $this->faker->latitude(),
            'lng' => $this->faker->longitude(),
            'zoom_level' => $this->faker->numberBetween(1, 10),
            'visit_date' => $this->faker->date(),
            'attach' => null,
            'read' => false,
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'branch_id' => $this->faker->randomNumber(),
            'visit_address' => $this->faker->address(),
        ];
    }
}
