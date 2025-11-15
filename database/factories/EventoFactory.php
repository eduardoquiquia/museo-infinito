<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'nombre' => fake()->sentence(3),
            'descripcion' => fake()->paragraph(),
            'fecha' => fake()->date(),
            'hora' => fake()->dateTime(),
            'ubicacion' => fake()->randomElement(['sala_principal','auditorio','jardin','sala_exposiciones']),
            'categoria' => fake()->randomElement(['concierto','exposicion','taller','conferencia']),
            'precio' => fake()->randomFloat(2, 10, 150),
            'capacidad' => fake()->numberBetween(20, 300),
            'ruta_imagen' => 'img/eventos/default.jpg',
            'estado' => fake()->randomElement(['activo', 'inactivo', 'cancelado']),
        ];
    }
}
