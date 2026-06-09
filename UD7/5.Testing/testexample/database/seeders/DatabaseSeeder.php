<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear 4 usuarios incluyendo uno llamado Fran
        User::factory()->create([
            'name' => 'Fran',
            'email' => 'fran@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Juan',
            'email' => 'juan@example.com',
        ]);

        User::factory()->create([
            'name' => 'Maria',
            'email' => 'maria@example.com',
        ]);
        
    }
}
