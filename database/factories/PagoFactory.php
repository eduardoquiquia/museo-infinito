<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'fecha' => fake()->date(),
            'monto' => fake()->randomFloat(2, 10, 300),
            'estado' => fake()->randomElement(['pendiente','completado','fallido']),
        ];
    }
}
