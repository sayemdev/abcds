<?php

namespace Database\Seeders;

use App\Models\InvoiceTest;
use Illuminate\Database\Seeder;

class InvoiceTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceTest::factory()->count(20)->create();
    }
}
