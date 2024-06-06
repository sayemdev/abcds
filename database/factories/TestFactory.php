<?php

namespace Database\Factories;

use App\Models\Test;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    protected $model = Test::class;

    public function definition()
    {
        $separated = $this->faker->boolean;
        $title = $separated ? false : true;
        
        return [
            'category_id' => Category::factory(),
            'parent_id' => $separated ? Test::factory() : null,
            'name' => $this->faker->word,
            'shortcut' => $this->faker->optional()->lexify('???'),
            'sample_type' => $this->faker->optional()->word,
            'unit' => $this->faker->optional()->word,
            'reference_range' => $this->faker->optional()->word,
            'type' => $this->faker->optional()->word,
            'separated' => $separated,
            'price' => $separated && !$title ? $this->faker->randomFloat(2, 10, 100) : null,
            'status' => $this->faker->boolean,
            'title' => $title,
            'precautions' => $this->faker->optional()->text,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
