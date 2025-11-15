<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EventoSeeder::class,
            ExhibicionSeeder::class,
            ProductoSeeder::class,
            ReservaSeeder::class,
            EntradaSeeder::class,
            PedidoSeeder::class,
            PedidoDetalleSeeder::class,
            PagoSeeder::class,
        ]);
    }
}
