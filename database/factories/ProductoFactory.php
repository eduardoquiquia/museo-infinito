<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'nombre' => fake()->word(),
            'descripcion' => fake()->sentence(),
            'categoria' => fake()->randomElement(['entradas','platos principales','acompañamientos','postres','bebidas']),
            'precio' => fake()->randomFloat(2, 5, 50),
            'ruta_imagen' => 'img/productos/default.jpg',
            'estado' => fake()->randomElement(['disponible','agotado','inactivo']),
        ];
    }
}
