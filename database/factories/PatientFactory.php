<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('20240521\d{4}'),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'dob' => $this->faker->date(),
        ];
    }
}
