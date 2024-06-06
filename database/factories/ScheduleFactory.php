<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shift;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee' => Employee::factory()->create()->id,
            'date' => $this->faker->date(),
            'shift_id' => function () {
                return Shift::factory()->create()->id;
            },
            'accept_extra_hours' => $this->faker->boolean,
            'status' => $this->faker->randomElement(['publish', 'draft']),
        ];
    }
}
