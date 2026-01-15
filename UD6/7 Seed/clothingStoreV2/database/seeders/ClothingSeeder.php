<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClothingItem;

class ClothingSeeder extends Seeder
{
    public function run()
    {
        // Add some fixed clothing items
        ClothingItem::insert([
            [
                'name' => 'Classic White T-Shirt',
                'size' => 'M',
                'price' => 19.99,
                'color' => 'White',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blue Denim Jeans',
                'size' => 'L',
                'price' => 49.99,
                'color' => 'Blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Black Hoodie',
                'size' => 'XL',
                'price' => 39.99,
                'color' => 'Black',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Generate 20 random clothing items using the factory
        ClothingItem::factory()->count(12)->create();
    }
}