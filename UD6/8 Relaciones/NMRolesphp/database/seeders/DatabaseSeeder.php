<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create the 8 canonical roles (using firstOrCreate to avoid duplicates)
        $canonicalRoles = [
            ['name' => 'Warrior', 'description' => 'Frontline fighter'],
            ['name' => 'Mage', 'description' => 'Caster of spells'],
            ['name' => 'Rogue', 'description' => 'Stealthy assassin'],
            ['name' => 'Priest', 'description' => 'Healer and support'],
            ['name' => 'Paladin', 'description' => 'Hollow knight'],
            ['name' => 'Druid', 'description' => 'Nature guardian'],
            ['name' => 'Hunter', 'description' => 'Ranged fighter with pets'],
            ['name' => 'Warlock', 'description' => 'Dark magic user'],
        ];

        foreach ($canonicalRoles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }

        // Create 5 players
        $players = Player::factory()->count(5)->create();

        // Attach 2–4 random roles to each player
    //pluck('id') retrieves all role IDs
        $roleIds = Role::pluck('id');

        foreach ($players as $player) {
    // syncWithoutDetaching allows adding roles without removing existing ones
            $player->roles()->syncWithoutDetaching(
                $roleIds->random(rand(2, 4))->values()->all()
            );
        }
    }
}