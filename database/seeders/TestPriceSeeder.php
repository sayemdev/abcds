<?php

namespace Database\Seeders;

use App\Models\TestPrice;
use Illuminate\Database\Seeder;

class TestPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestPrice::factory(10)->create();
    }
}
