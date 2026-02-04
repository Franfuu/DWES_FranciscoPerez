<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Create users only if they don't exist (firstOrCreate by email)
        User::firstOrCreate(
            ['email' => 'aria@example.com'],
            ['name' => 'Aria Nightwind', 'password' => Hash::make('password')]
        );

        User::firstOrCreate(
            ['email' => 'borin@example.com'],
            ['name' => 'Borin Stonehelm', 'password' => Hash::make('password')]
        );

        User::firstOrCreate(
            ['email' => 'selene@example.com'],
            ['name' => 'Selene Riversong', 'password' => Hash::make('password')]
        );
    }
}