<?php

namespace Database\Factories;

use App\Models\TestPrice;
use App\Models\Test; // Import Test model
use Illuminate\Database\Eloquent\Factories\Factory;

class TestPriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TestPrice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get all test IDs from the tests table
        $testIds = Test::pluck('id')->toArray();

        return [
            'test_id' => $this->faker->randomElement($testIds),
            'price' => $this->faker->randomFloat(2, 10, 200),
        ];
    }
}
