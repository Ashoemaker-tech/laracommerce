<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = Category::all();
        $products = Product::all();

        // Add each product to a random category
        foreach ($products as $product) {
            $category = $categories->random();
            $product->categories()->attach($category->id);
        }
    }
}
