<?php

namespace Database\Seeders;

use App\Models\Entrada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
{
    public function run(): void
    {
        Entrada::factory(20)->create()
            ->each(function ($entrada) {
                $entrada->pago()->create([
                    'user_id' => $entrada->user_id,
                    'monto' => $entrada->total,
                    'fecha' => now(),
                    'estado' => 'completado',
                ]);
            });
    }
}
