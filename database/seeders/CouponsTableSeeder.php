<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Coupon::create([
            'code' => '10OFF',
            'type' => 'fixed',
            'value' => 1000,
        ]);

        Coupon::create([
            'code' => 'HAPPY30',
            'type' => 'percent',
            'value' => 50,
        ]);
    }
}
