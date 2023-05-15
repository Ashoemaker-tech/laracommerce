<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Get all products
        $products = Product::all();

        // TODO add some public image urls from fake store api
        $images = [
            [
                'url' => 'product1.jpg',
                'is_main' => true,
            ],
            [
                'url' => 'product2.jpg',
                'is_main' => false,
            ],
            [
                'url' => 'product3.jpg',
                'is_main' => false,
            ],
        ];

        // Loop through each product and create images
        foreach ($products as $product) {
            foreach ($images as $image) {
                ProductImage::create(array_merge($image, [
                    'product_id' => $product->id,
                ]));
            }
        }
    }
}
