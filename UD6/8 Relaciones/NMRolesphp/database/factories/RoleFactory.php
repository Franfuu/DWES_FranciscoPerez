<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class RoleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->jobTitle(), // fallback if not using sequence
            'description' => $this->faker->sentence(3),
        ];
    }

    /**
     * Helper to generate 8 canonical RPG roles with descriptions.
     */
    public function canonical(): static
    {
        $items = [
            ['name' => 'Warrior', 'description' => 'Frontline fighter'],
            ['name' => 'Mage', 'description' => 'Caster of spells'],
            ['name' => 'Rogue', 'description' => 'Stealthy assassin'],
            ['name' => 'Priest', 'description' => 'Healer and support'],
            ['name' => 'Paladin', 'description' => 'Hollow knight'],
            ['name' => 'Druid', 'description' => 'Nature guardian'],
            ['name' => 'Hunter', 'description' => 'Ranged fighter with pets'],
            ['name' => 'Warlock', 'description' => 'Dark magic user'],
        ];

        return $this->state(new Sequence(...$items));
    }
}
