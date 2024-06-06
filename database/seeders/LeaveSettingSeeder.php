<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeaveSetting;

class LeaveSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run(): void
    {
        LeaveSetting::create([
            'name' => 'Maternity Leave',
            'days' => 90,
            'paid' => true,
            'status' => 'active',
            'max' => 60,
        ]);

        LeaveSetting::create([
            'name' => 'Paternity Leave',
            'days' => 14,
            'paid' => true,
            'status' => 'active',
            'max' => 5,
        ]);

        LeaveSetting::create([
            'name' => 'Sick Leave',
            'days' => 10,
            'paid' => true,
            'status' => 'active',
            'max' => 6,
        ]);

        LeaveSetting::create([
            'name' => 'Annual Leave',
            'days' => 15,
            'paid' => false,
            'status' => 'active',
            'max' => 8,
        ]);

        LeaveSetting::create([
            'name' => 'Hospitalisation Leave',
            'days' => 15,
            'paid' => false,
            'status' => 'inactive',
            'max' => 10,
        ]);

    }
}
