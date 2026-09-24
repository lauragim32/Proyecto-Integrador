<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Origin;

class OriginSeeder extends Seeder
{
    public function run(): void
    {
        Origin::insert([
            ['nombre' => 'Redes Sociales'],
            ['nombre' => 'Recomendación'],
            ['nombre' => 'Página Web'],
            ['nombre' => 'Evento'],
            ['nombre' => 'Otro'],
        ]);
    }
}
