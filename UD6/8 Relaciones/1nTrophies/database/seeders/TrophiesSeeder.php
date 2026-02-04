<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Trophy;

class TrophiesSeeder extends Seeder
{
    public function run(): void
    {
        // Straight insert, assuming user IDs 1..3 exist from UsersSeeder
        Trophy::insert([
            // Aria (user_id = 1)
            ['user_id' => 1, 'title' => 'Master Archer',  'description' => 'Top score in precision challenge', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'title' => 'Shadow Runner',  'description' => 'Fastest stealth course time',       'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'title' => 'Sky Watcher',    'description' => 'Completed aerial trials',           'created_at' => now(), 'updated_at' => now()],

            // Borin (user_id = 2)
            ['user_id' => 2, 'title' => 'Dragon Slayer',  'description' => 'Defeated the cavern drake',         'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'title' => 'Stone Guardian', 'description' => 'Held the line for 10 waves',        'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'title' => 'Axe Maestro',    'description' => 'Perfect axe technique award',       'created_at' => now(), 'updated_at' => now()],

            // Selene (user_id = 3)
            ['user_id' => 3, 'title' => 'River Champion', 'description' => 'Won the river regatta',             'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'title' => 'Lore Keeper',    'description' => 'Solved all ancient riddles',        'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'title' => 'Moonlit Victor', 'description' => 'Tournament champion at night',      'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
