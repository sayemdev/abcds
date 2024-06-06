<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CultureOption;

class CultureOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CultureOption::factory()->count(10)->create();
    }
}
