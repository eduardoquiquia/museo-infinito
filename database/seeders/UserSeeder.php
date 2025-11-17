<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador específico
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'estado' => 'activo',
            'email_verified_at' => now(),
        ]);

        // Crear usuario editor específico
        User::create([
            'name' => 'Editor Principal',
            'email' => 'editor@example.com',
            'password' => Hash::make('editor123'),
            'role' => 'usuario',
            'estado' => 'activo',
            'email_verified_at' => now(),
        ]);

        // Crear 10 usuarios aleatorios usando el Factory
        User::factory()->count(10)->create();

        // Crear 5 usuarios no verificados
        User::factory()->count(5)->unverified()->create();

        // Crear usuarios con roles específicos
        User::factory()->create(['role' => 'admin']);
        User::factory()->create(['role' => 'usuario']);
    }
}
