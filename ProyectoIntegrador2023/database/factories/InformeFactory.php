<?php

namespace Database\Factories;

use App\Models\Practicante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Informe>
 */
class InformeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'practicante_id' => Practicante::all()->random()->id,
            'documento' => $this->faker->word,


        ];
    }
}
