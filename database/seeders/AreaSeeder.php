<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
class AreaSeeder extends Seeder
{
    public function run(): void
    {
        // Crear algunas áreas de ejemplo
        Area::create(['nombre' => 'Administrador']);
        Area::create(['nombre' => 'Empleado']);
        Area::create(['nombre' => 'Gerente']);
    }
}
