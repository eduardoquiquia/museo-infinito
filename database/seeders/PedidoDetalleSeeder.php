<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoDetalleSeeder extends Seeder
{
    public function run(): void
    {
        Pedido::all()->each(function ($pedido) {
            PedidoDetalle::factory(rand(1,4))->create([
                'pedido_id' => $pedido->id,
            ]);
        });
    }
}
