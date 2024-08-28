<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    // Definir la tabla si el nombre no sigue la convención de Laravel
    protected $table = 'areas';

    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = ['nombre'];

    // Relación uno a muchos con Empleados
    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
