<?php

namespace Database\Factories;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{    protected $model = Empleado::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'area_id' => 1,  // Cambia 'area' por 'area_id'
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'area' => $this->faker->randomElement(['desarrollo', 'marketing', 'ventas']),
            'descripcion' => $this->faker->sentence(),
            'boletin' => $this->faker->boolean(),
        ];
    }
}
