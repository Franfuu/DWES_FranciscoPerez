<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{   // Francisco Perez
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
    //Using DB facade to insert data directly
        // This is an alternative to using model factories
        // and allows for quick seeding of the database without needing to define a factory.
        // It is useful for simple seed data or when you want to quickly populate the database with
        // some initial data without the overhead of creating a factory.

        // seed the users table with 10 random users
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                'password' => Hash::make('password'),
            ]);
        }

        // seed the products table with 50 random products
        // usa el insert de DB facade para insertar datos directamente, no lo vamos a usar ngg
        for ($i = 0; $i < 21; $i++) {
        DB::table('clothing_items')->insert([
            'name' => Str::random(10),
            'size' => Str::random(5), // Assuming size is a string
            'price' => rand(10, 100),
            'color' => Str::random(5), // Assuming color is a string
        ]);
        }
    }
}