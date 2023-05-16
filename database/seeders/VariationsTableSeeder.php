<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Variation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GET from other repo
        // Get all products
        $products = Product::all();

        $variations = [
            [
                'title' => 'White',
                'type' => 'color',
                'order' => 1
            ],
            [
                'title' => 'Black',
                'type' => 'color',
                'order' => 1
            ],
            [
                'title' => 'Brown',
                'type' => 'color',
                'order' => 1
            ]
        ];
        $parentId = 1;

        // Loop through each product and create variations
        foreach ($products as $product) {
            // Loop through each variation
            foreach ($variations as $variation) {
                Variation::create( array_merge($variation, [
                    'product_id' => $product->id,
                    'price' => $product->price,
                ]));
                Variation::create([
                    'product_id' => $product->id,
                    'title' => 'Small',
                    'price' => $product->price,
                    'type' => 'size',
                    'sku' => 'SML' . rand(100, 999),
                    'order' => 2,
                    'parent_id' => $parentId
                ]);
                Variation::create([
                    'product_id' => $product->id,
                    'title' => 'Medium',
                    'price' => $product->price,
                    'type' => 'size',
                    'sku' => 'MED' . rand(100, 999),
                    'order' => 2,
                    'parent_id' => $parentId
                ]);
                Variation::create([
                    'product_id' => $product->id,
                    'title' => 'Large',
                    'price' => $product->price + 50000,
                    'type' => 'size',
                    'sku' => 'LRG' . rand(100, 999),
                    'order' => 2,
                    'parent_id' => $parentId
                ]);

                $parentId += 4;
            }
        }
    }
}
