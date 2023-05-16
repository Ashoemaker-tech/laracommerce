<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // GET This INFO FROM OTHER REPO
        $products = [
            [
                'title' => 'Sleepy Boy Couch',
                'slug' => 'sleepy-boy-couch',
                'description' => 'Introducing our luxurious Comfy Couch, designed to provide the ultimate relaxation experience in your living space. This stylish and spacious sofa is crafted with high-quality materials and plush cushioning, ensuring exceptional comfort and support. Upholstered in a soft, durable fabric, its perfect for cozy movie nights, laid-back reading sessions, or simply unwinding after a long day. With its timeless design and unmatched coziness, the Comfy Couch is the perfect addition to any home elevating your lounging experience to new heights of indulgence.',
                'price' => 10000,
                'live_at' => now()
            ],
            [
                'title' => 'Outdoor Patio Set',
                'slug' => 'patio-set',
                'description' => 'Introducing our elegant Outdoor Patio Set, the perfect solution to transform your backyard, balcony, or garden into a stylish and functional oasis. This sophisticated ensemble features a durable, weather-resistant construction, ensuring it can withstand the elements while maintaining its visual appeal. The set includes a spacious table, comfortable chairs, and plush cushions, providing an inviting space for al fresco dining, entertaining, or simply relaxing with friends and family. With its timeless design, premium materials, and exceptional comfort, our Outdoor Patio Set is the ultimate investment for enhancing your outdoor living experience and creating unforgettable memories under the sun.',
                'price' => 20000,
                'live_at' => now()
            ],
            [
                'title' => 'Cozy Haven Futon',
                'slug' => 'cozy-haven-futon',
                'description' => 'A versatile futon that easily converts from a sofa to a comfortable bed, perfect for small spaces',
                'price' => 30000,
                'live_at' => now()
            ],
            [
                'title' => 'Elegant Embrace Bed',
                'slug' => 'elegant-embrace-bed',
                'description' => 'A luxurious bed with a plush upholstered headboard and sleek wooden frame',
                'price' => 40000,
                'live_at' => now()
            ],
            [
                'title' => 'Serene Oasis Sofa',
                'slug' => 'serene-oasis-sofa',
                'description' => 'A comfortable sofa with soft cushions and a contemporary design',
                'price' => 50000,
                'live_at' => now()
            ],
            [
                'title' => 'Harmony Dining Table',
                'slug' => 'harmony-dining-table',
                'description' => 'A spacious dining table crafted from solid oak, perfect for family gatherings',
                'price' => 60000,
                'live_at' => now()
            ],
            [
                'title' => 'Tranquil Haven Armchair',
                'slug' => ' tranquil-haven-armchair',
                'description' => 'A cozy armchair with a high backrest and padded armrests for ultimate relaxation',
                'price' => 70000,
                'live_at' => now()
            ],
            [
                'title' => 'Classic Elegance Dresser',
                'slug' => 'classic-elegance-dresser',
                'description' => ' A timeless dresser with multiple drawers for convenient storage and a mirror attached',
                'price' => 80000,
                'live_at' => now()
            ],
            [
                'title' => 'Zenith Coffee Table',
                'slug' => 'zenith-coffee-table',
                'description' => 'A sleek and modern coffee table with a tempered glass top and minimalist metal legs',
                'price' => 90000,
                'live_at' => now()
            ],
            [
                'title' => 'Vintage Charmer Wardrobe',
                'slug' => 'vintage-charmer-wardrobe',
                'description' => 'An enchanting wardrobe with ornate carvings and ample hanging and storage space.',
                'price' => 100000,
                'live_at' => now()
            ],
            [
                'title' => 'Urban Loft Desk',
                'slug' => 'urban-loft-desk',
                'description' => 'A compact and stylish desk with built-in shelves and a sliding keyboard tray',
                'price' => 110000,
                'live_at' => now()
            ],
            [
                'title' => 'Cosy Retreat Recliner',
                'slug' => 'cosy-retreat-recliner',
                'description' => 'A plush recliner chair that provides exceptional comfort with adjustable positions',
                'price' => 120000,
                'live_at' => now()
            ],
            [
                'title' => 'Tranquil Dreams Nightstand',
                'slug' => 'tranquil-dreams-nightstand',
                'description' => 'A bedside table with a drawer and open shelf, perfect for keeping essentials close at hand.',
                'price' => 130000,
                'live_at' => now()
            ],
            [
                'title' => 'Modern Maven Bookcase',
                'slug' => 'modern-maven-bookcase',
                'description' => 'A contemporary bookcase with adjustable shelves and a geometric design',
                'price' => 140000,
                'live_at' => now()
            ],
            [
                'title' => 'Chic Haven Sectional',
                'slug' => 'chic-haven-sectional',
                'description' => 'A versatile sectional sofa with a chaise lounge, ideal for lounging and entertaining',
                'price' => 150000,
                'live_at' => now()
            ],
            [
                'title' => 'Refined Retreat Ottoman',
                'slug' => 'refined-retreat-ottoman',
                'description' => 'A stylish ottoman that doubles as extra seating or a convenient footrest',
                'price' => 160000,
                'live_at' => now()
            ],
            [
                'title' => 'Coastal Breeze Console Table',
                'slug' => 'coastal-breeze-console-table',
                'description' => 'A coastal-themed console table with a weathered finish and storage drawers',
                'price' => 170000,
                'live_at' => now()
            ],
            [
                'title' => 'Urban Chic Bar Stool',
                'slug' => ' urban-chic-bar-stool',
                'description' => 'A trendy bar stool with a padded seat, sleek metal legs, and a swivel feature.',
                'price' => 180000,
                'live_at' => now()
            ],
            [
                'title' => 'Regal Splendor Vanity',
                'slug' => 'regal-splendor-vanity',
                'description' => 'A luxurious vanity table with a mirror, drawers, and an upholstered stool',
                'price' => 190000,
                'live_at' => now()
            ],
            [
                'title' => 'Nordic Comfort Rocking Chair',
                'slug' => 'nordic-comfort-rocking-chair',
                'description' => 'A Scandinavian-inspired rocking chair with a solid wood frame and a cozy cushion',
                'price' => 200000,
                'live_at' => now()
            ],
            [
                'title' => 'Minimalist Maven Sideboard',
                'slug' => 'minimalist-maven-sideboard',
                'description' => 'A minimalist sideboard with clean lines and ample storage space for your dining essentials',
                'price' => 210000,
                'live_at' => now()
            ],
            [
                'title' => 'Rustic Retreat Bench',
                'slug' => 'rustic-retreat-bench',
                'description' => 'A charming bench made from reclaimed wood, perfect for entryways or dining areas.',
                'price' => 220000,
                'live_at' => now()
            ],
            [
                'title' => 'Serene Haven Wardrobe',
                'slug' => 'A spacious wardrobe with sliding doors, multiple compartments, and a full-length mirror.',
                'description' => 'serene-haven-wardrobe',
                'price' => 230000,
                'live_at' => now()
            ],
            [
                'title' => 'Vintage Vibe Chest of Drawers',
                'slug' => 'vintage-vibe-chest-of-drawers',
                'description' => 'A vintage-style chest of drawers with decorative handles and a distressed finish',
                'price' => 240000,
                'live_at' => now()
            ],
            [
                'title' => 'Modern Comfort Bedside Table',
                'slug' => 'modern-comfort-bedside-table',
                'description' => 'A sleek bedside table with a drawer and an open shelf for storing nighttime essentials.',
                'price' => 250000,
                'live_at' => now()
            ],
        
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
