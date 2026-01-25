<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'  => $this->faker->unique()->firstName(),
            'level' => $this->faker->numberBetween(1, 20),
        ];
    }
}
