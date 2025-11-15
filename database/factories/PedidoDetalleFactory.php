<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoDetalleFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        $cantidad = fake()->numberBetween(1,3);
        $producto = Producto::factory()->create();

        return [
            'producto_id' => $producto->id,
            'cantidad' => $cantidad,
            'subtotal' => $cantidad * $producto->precio,
        ];
    }
}
