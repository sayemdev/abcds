<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Designation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employeeId = 'EMP' . str_pad($this->faker->unique()->numberBetween(1, 999999), 6, '0', STR_PAD_LEFT);
        $rateTypes = ['hourly', 'monthly', 'trimonthly', 'halfyearly', 'annually'];

        return [
            'name' => $this->faker->name,
            'employee_id' => $employeeId,
            'email' => $this->faker->unique()->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'profile' => $this->faker->imageUrl(),
            'join_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'password' => bcrypt('password'), // You may change this default password
            'branch' => $this->faker->city, // New field: Branch
            'designation' => Designation::factory()->create()->id,
            'rate' => $this->faker->randomFloat(2, 10, 100), // Adjust min and max values as needed
            'rate_type' => $this->faker->randomElement($rateTypes),       
        ];
    }
}
