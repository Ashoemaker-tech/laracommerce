<?php

namespace Database\Seeders;

use App\Models\Stock;
use App\Models\Variation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Get all variations
        $variations = Variation::all();

        // Define a default stock amount anything below 5 will show low stock 0 will show out of stock
        $defaultStockAmount = 10;

        // Loop through each variation and create stock
        foreach ($variations as $variation) {
            Stock::create([
                'variation_id' => $variation->id,
                'amount' => $defaultStockAmount,
            ]);
        }
    }
}
