<?php

namespace Database\Factories;

use App\Models\InvoiceTest;
use App\Models\Invoice;
use App\Models\Test;
use App\Models\Culture;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceTestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvoiceTest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $invoice = Invoice::factory()->create();

        $type = $this->faker->randomElement(['test', 'culture']);
        $testOrCulture = $type === 'test' ? Test::factory()->create() : Culture::factory()->create();
        
        return [
            'invoice_id' => $invoice->id,
            'test_id' => $type === 'test' ? $testOrCulture->id : null,
            'culture_id' => $type === 'culture' ? $testOrCulture->id : null,
            'price' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
