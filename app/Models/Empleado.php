<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'sexo',
        'area_id',
        'descripcion',
        'boletin'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'empleado_rol', 'empleado_id', 'rol_id');
    }
}
