<?php

namespace Database\Seeders;

use App\Models\CulturePrice;
use Illuminate\Database\Seeder;

class CulturePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CulturePrice::factory(10)->create();
    }
}
