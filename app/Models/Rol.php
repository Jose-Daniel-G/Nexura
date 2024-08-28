<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    // Definir la tabla si el nombre no sigue la convención de Laravel
    protected $table = 'roles';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = ['nombre'];

    // Relación uno a muchos con Empleados
    
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_rol', 'rol_id', 'empleado_id');
    }
}
