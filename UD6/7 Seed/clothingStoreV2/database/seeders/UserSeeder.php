<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        // Using model factories to create users, let´s create an admin user first 
        // This is useful for setting up an initial user with specific credentials
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@fcorios.com',
        ]);

        // Using model factories to create 10 random users
        // This is useful for populating the database with sample data for testing or development purposes
        //You can find the User factory in database/factories/UserFactory.php
        //Laravel User factory brings by default.
        User::factory(10)->create();


        //Using DB facade to insert data directly
        // This is an alternative to using model factories
        // and allows for quick seeding of the database without needing to define a factory.
        // It is useful for simple seed data or when you want to quickly populate the database with
        // some initial data without the overhead of creating a factory.

        // seed the users table with 10 random users
        for ($i = 0; $i < 21; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@nigger.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
