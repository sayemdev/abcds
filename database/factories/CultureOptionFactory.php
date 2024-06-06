<?php

namespace Database\Factories;

use App\Models\CultureOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class CultureOptionFactory extends Factory
{
    protected $model = CultureOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'options' => json_encode($this->faker->words(5)),
        ];
    }
}
