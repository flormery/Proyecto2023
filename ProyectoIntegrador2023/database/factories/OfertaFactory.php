<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Oferta>
 */
class OfertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name=$this->faker->unique()->word(20);
        $date=$this->faker->unique()->date;
        $integer=$this->faker->unique()->numberBetween(9,99);

        return [
            'titulo'=> $name,
            'descripcion' => $name,
            'fechainicio' => $date,
            'fechafin' => $date,
            'vacante' => $integer,

        ];
    }
}
