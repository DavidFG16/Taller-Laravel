<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'space_id' => fn () => Space::factory()->create()->id,
            'name'     => fake()->unique()->bothify('Sala-###'),
            'capacity' => fake()->numberBetween(2, 30),
            'type'     => fake()->randomElement(['meeting','workshop','phonebooth','auditorium']),
            'is_active'=> true,
        ];
}
}
