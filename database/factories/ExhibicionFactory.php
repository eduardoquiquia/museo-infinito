<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExhibicionFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'nombre' => fake()->sentence(3),
            'descripcion' => fake()->paragraph(),
            'categoria' => fake()->randomElement(['arqueologia','historia','fossiles','arte','antiguedades']),
            'ruta_imagen_360' => 'img/exhibiciones/default360.jpg',
            'periodo' => fake()->randomElement(['prehistoria','edad antigua','edad media','moderna']),
            'fecha_descubrimiento' => fake()->date(),
            'lugar_hallazgo' => fake()->city(),
            'descripcion_detallada' => fake()->paragraph(4),
        ];
    }
}
