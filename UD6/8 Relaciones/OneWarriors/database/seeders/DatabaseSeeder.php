<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Championship;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 3 users
        $users = User::factory()->count(3)->create();

        // Create one Championship for each User
        foreach ($users as $index => $user) {
            Championship::create([
                'user_id' => $user->id,
                'warrior_equipment' => ['Sword & Shield', 'Bow & Arrows', 'Axe & Armor'][$index]
            ]);
        }
    }
}