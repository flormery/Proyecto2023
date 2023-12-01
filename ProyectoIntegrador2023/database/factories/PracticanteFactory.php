<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practicante>
 */
class PracticanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'empresa' => $this->faker->company,
            'maps' => 'https://www.google.com/maps?q=' . $this->faker->latitude . ',' . $this->faker->longitude,
            'agenda' => $this->faker->randomElement(['agendado', 'no agendado']),
        ];
    }
}
