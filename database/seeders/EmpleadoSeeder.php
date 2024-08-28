<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{   
    public function run()
    {
        // Crea 10 empleados de ejemplo
        // Empleado::factory()->count(10)->create();
        Empleado::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'sexo' => 'M',
            'area_id' => 1,  // Usar 'area_id' en lugar de 'area'
            'descripcion' => 'Descripción del empleado',
            'boletin' => true,
        ]);

        Empleado::create([
            'nombre' => 'Ana López',
            'email' => 'ana.lopez@example.com',
            'sexo' => 'F',
            'area_id' => 2,
            'descripcion' => 'Otra descripción',
            'boletin' => false,
        ]);
    }
}
