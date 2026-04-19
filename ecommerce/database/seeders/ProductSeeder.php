<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category ; 
use App\Models\Product ; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Ensure categories exist first
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class);
        }

        $categories = Category::all();
        
        $products = [
            [
                'name' => 'Ceramic Artisan Vessel',
                'description' => 'Hand-thrown stoneware vessel with a subtle matte glaze. Each piece is uniquely shaped, bringing an earthy presence to any space.',
                'price' => 145.00,
                'origin' => 'Kyoto',
                'material' => 'Stoneware',
                'color' => 'Warm Sand',
            ],
            [
                'name' => 'Oak Display Plinth',
                'description' => 'Solid oak plinth, perfect for elevating your favorite objects. Finished with natural oil.',
                'price' => 210.00,
                'origin' => 'Local Studio',
                'material' => 'Oak Wood',
                'color' => 'Natural',
            ],
            [
                'name' => 'Brass Incense Holder',
                'description' => 'Hand-poured brass holder with a minimalist profile. Designed in Copenhagen.',
                'price' => 48.00,
                'origin' => 'Copenhagen',
                'material' => 'Brass',
                'color' => 'Warm Brass',
            ],
            [
                'name' => 'Textured Linen Throw',
                'description' => 'Heavyweight linen throw with a subtle texture. Pre-washed for extra softness.',
                'price' => 120.00,
                'origin' => 'Local Studio',
                'material' => '100% Linen',
                'color' => 'Sage Green',
            ],
            [
                'name' => 'Beeswax Pillar Trio',
                'description' => 'Set of three hand-poured beeswax pillars. Burns clean with a subtle honey scent.',
                'price' => 35.00,
                'origin' => 'Local Studio',
                'material' => 'Organic Beeswax',
                'color' => 'Natural',
            ],
            [
                'name' => 'Glass Pour-Over Carafe',
                'description' => 'Borosilicate glass carafe designed for the perfect pour-over coffee ritual.',
                'price' => 85.00,
                'origin' => 'Kyoto',
                'material' => 'Borosilicate Glass',
                'color' => 'Clear',
            ],
            [
                'name' => 'Matcha Ritual Bowl',
                'description' => 'Traditional ceramic bowl for matcha preparation. Glazed interior, raw exterior.',
                'price' => 60.00,
                'origin' => 'Kyoto',
                'material' => 'Ceramic',
                'color' => 'Muted Ash',
            ],
            [
                'name' => 'Woven Storage Basket',
                'description' => 'Handwoven rattan basket with leather handles. Perfect for storing textiles or magazines.',
                'price' => 95.00,
                'origin' => 'Local Studio',
                'material' => 'Rattan',
                'color' => 'Natural',
            ],
            [
                'name' => 'Stone Mortar & Pestle',
                'description' => 'Solid granite mortar and pestle. Ideal for grinding spices or making pesto.',
                'price' => 110.00,
                'origin' => 'Copenhagen',
                'material' => 'Granite',
                'color' => 'Dark Grey',
            ],
        ];

        foreach ($products as $productData) {
            $category = $categories->random();
            
            $images = $this->generateMockImages($productData['name']);
            
            Product::create([
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'description' => $productData['description'],
                'price' => $productData['price'],
                'stock_quantity' => rand(5, 50),
                'category_id' => $category->id,
                'origin' => $productData['origin'],
                'color' => $productData['color'],
                'material' => $productData['material'],
                'images' => $images,
                'is_active' => true,
            ]);
        }
    }

    /**
     * Generate mock image URLs for a product.
     * Returns a JSON array of image URLs.
     */
    private function generateMockImages(string $productName): array
    {
        // Use specific Picsum image IDs based on product name hash to keep consistency
        $hash = crc32($productName);
        
        // Generate 3 images: main, detail, context
        $imageIds = [
            abs($hash) % 1000,              // Main image
            (abs($hash) + 100) % 1000,      // Detail shot
            (abs($hash) + 200) % 1000,      // Context shot
        ];
        
        $images = [];
        foreach ($imageIds as $id) {
            // Using Picsum with specific ID for consistent images
            // Dimensions: 600x800 (portrait) suitable for product cards
            $images[] = "https://picsum.photos/id/{$id}/600/800";
        }
        
        return $images;
    }
}
