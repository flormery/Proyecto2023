<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes'; // Nombre de la tabla en la base de datos

    // Relación con el modelo Docente
    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'asignaciones');
    }
}
