<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Docente extends Model
{
    use HasFactory;
    // Relación con el modelo Estudiante
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'asignaciones');
    }
}
