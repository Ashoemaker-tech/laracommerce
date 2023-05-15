<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                'title' => 'Living Room',
                'slug' => 'living-room'
            ],
            [
                'title' => 'Bedroom',
                'slug' => 'bedroom'
            ],
            [
                'title' => 'Kitchen',
                'slug' => 'kitchen'
            ],
            [
                'title' => 'Sale',
                'slug' => 'sale'
            ],
            [
                'title' => 'New Arrivals',
                'slug' => 'new-arrivals'
            ],
            [
                'title' => 'Outdoor',
                'slug' => 'outdoor'
            ]
        ];
        // Insert the categories into the database
        Category::insert($categories);
    }
}
