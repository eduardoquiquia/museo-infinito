<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagoSeeder extends Seeder
{
    public function run(): void
    {
        Pedido::whereNotNull('reserva_id')->each(function ($pedido) {
            $pedido->pago()->create([
                'user_id' => $pedido->reserva_id,
                'fecha' => now(),
                'monto' => $pedido->total,
                'estado' => 'completado',
            ]);
        });
    }
}
