<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    public function asignarDocente($estudianteId)
    {
        $estudiante = Estudiante::findOrFail($estudianteId);
        $docente = Docente::where('disponible', true)->inRandomOrder()->first();

        if ($docente) {
            $estudiante->docentes()->attach($docente->id);
            return "Docente asignado correctamente al estudiante";
        } else {
            return "No hay docentes disponibles en este momento";
        }
    }
}
