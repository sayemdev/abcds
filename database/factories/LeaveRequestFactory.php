<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRequest>
 */
class LeaveRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leave_id' => rand(1, 5), 
            'employee_id' => rand(5, 15),
            'from' => $this->faker->date(),
            'to' => $this->faker->date(),
            'reason' => $this->faker->text,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
