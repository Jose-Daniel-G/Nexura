<?php

namespace Database\Seeders;
use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoRolSeeder extends Seeder
{
    public function run()
    {
        // Obtener empleados y roles
        $empleado1 = Empleado::where('nombre', 'Juan Pérez')->first();
        $empleado2 = Empleado::where('nombre', 'Ana López')->first();

        $rol1 = Rol::where('nombre', 'Profesional de proyectos - Desarrollador')->first();
        $rol2 = Rol::where('nombre', 'Gerente estratégico')->first();

        // Asociar roles a empleados
        if ($empleado1 && $rol2) {
            $empleado1->roles()->attach($rol2->id);
        }

        if ($empleado2 && $rol1) {
            $empleado2->roles()->attach($rol1->id);
        }
    }
}
