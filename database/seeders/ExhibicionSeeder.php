<?php

namespace Database\Seeders;

use App\Models\Exhibicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExhibicionSeeder extends Seeder
{
    public function run(): void
    {
        Exhibicion::factory(10)->create();
    }
}
