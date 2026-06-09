<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_users_list(): void
    {
        // Ejecutar el seeder para que se cree la data de prueba
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/users');

        //Qué queremos que ocurra?
        $response->assertStatus(200); //Primero, comprobamos que la respuesta sea 200

        //comprobamos que el contenido de la respuesta sea el esperado
        $response->assertJsonStructure([
                [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',        
                    'updated_at',
                ],
            ]);

            //Ahora vamos a preguntar si nos devuelve un dato que sabemos que nos debe devolver.
            //En este caso, sabemos que debe devolver un usuario con nombre Antonio
            //Si no lo devuelve, la prueba fallará
        $response->assertJsonFragment([
                'name' => 'Fran',
        ]);

        //Por último, comprobamos que el número de usuarios devueltos sea el esperado   
        //Sabemos, cuando la poblemos, cuántos usuarios hay, y si no devuelve el número esperado, la prueba fallará
        //Si poblamnos con 4 usuarios, debería devolver 4
        $response->assertJsonCount(4);
    }

    public function test_get_user_detail(): void
    {
        // Ejecutar el seeder para que se cree la data de prueba
        $this->seed(DatabaseSeeder::class);

        $userId = 1; // Assuming we are testing with user ID 1
        $response = $this->get("/users/{$userId}");

        // Check that the response status is 200
        $response->assertStatus(200);

        // Check that the response has the expected structure
        //Ahora no es un array, si no que es solo un dato
        $response->assertJsonStructure([
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ]);

        // Check that the response contains the expected user data
        //Aquí comprobamos que el usuario con ID 1 se llame Antonio, no necesitamos contar el número de elementos
        $response->assertJsonFragment([
            'id' => $userId,
            'name' => 'Fran', // Assuming the user with ID 1 is named Fran
        ]);
    }
}