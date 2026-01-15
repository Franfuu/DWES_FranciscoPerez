<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClothingItem;

class ClothingSeeder extends Seeder
{
    public function run(): void
    {
        ClothingItem::factory()->count(10)->create();
    }
}
