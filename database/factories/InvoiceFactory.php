<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Branch;
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'branch_id' => Branch::factory(),
            'doctor_id' => Doctor::factory(),
            'contract_id' => Contract::factory(),
            'date' => $this->faker->date,
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'paid' => $this->faker->randomFloat(2, 0, 100),
            'status' => 'pending',
        ];
    }
}
