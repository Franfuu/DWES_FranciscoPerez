<?php

namespace Database\Factories;

use App\Models\ClothingItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClothingItemFactory extends Factory
{
    protected $model = ClothingItem::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Camiseta', 'Pantalón', 'Chaqueta', 'Vestido', 'Falda', 'Jersey']),
            'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'color' => $this->faker->safeColorName(),
            'price' => $this->faker->randomFloat(2, 10, 200),
            // Ajusta los campos según tu modelo
        ];
    }
}