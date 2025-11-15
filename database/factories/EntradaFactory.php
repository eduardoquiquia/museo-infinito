<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntradaFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        $cantidad = fake()->numberBetween(1,5);
        $precioUnit = fake()->randomFloat(2, 10, 50);

        return [
            'user_id' => User::factory(),
            'tipo' => fake()->randomElement(['general','adulto mayor','estudiantes','niños']),
            'fecha_compra' => fake()->date(),
            'fecha_visita' => fake()->date(),
            'cantidad' => $cantidad,
            'precio_unitario' => $precioUnit,
            'total' => $cantidad * $precioUnit,
            'estado' => fake()->randomElement(['pendiente','pagada','cancelada']),
            'origen_type' => Evento::class,
            'origen_id' => Evento::factory(),
        ];
    }
}
