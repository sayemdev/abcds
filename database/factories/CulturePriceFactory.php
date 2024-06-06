<?php

namespace Database\Factories;

use App\Models\CulturePrice;
use App\Models\Culture; // Import Culture model
use Illuminate\Database\Eloquent\Factories\Factory;

class CulturePriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CulturePrice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get all culture IDs from the cultures table
        $cultureIds = Culture::pluck('id')->toArray();

        return [
            'culture_id' => $this->faker->randomElement($cultureIds),
            'price' => $this->faker->randomFloat(2, 10, 200),
        ];
    }
}
