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
                'url' => 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg',
                'is_main' => true,
            ],
            [
                'url' => 'https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg',
                'is_main' => false,
            ],
            [
                'url' => 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg',
                'is_main' => false,
            ],
            [
                'url' => 'https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg',
                'is_main' => false,
            ],
            [
                'url' => 'https://fakestoreapi.com/img/71pWzhdJNwL._AC_UL640_QL65_ML3_.jpg',
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
