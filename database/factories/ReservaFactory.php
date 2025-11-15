<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'contacto' => fake()->phoneNumber(),
            'fecha' => fake()->date(),
            'hora' => fake()->dateTime(),
            'personas' => fake()->numberBetween(1, 10),
            'estado' => fake()->randomElement(['pendiente','confirmada','cancelada']),
        ];
    }
}
