<?php

namespace Database\Factories;

use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'reserva_id' => Reserva::factory(),
            'fecha_hora' => fake()->dateTime(),
            'total' => fake()->randomFloat(2, 20, 300),
        ];
    }
}
