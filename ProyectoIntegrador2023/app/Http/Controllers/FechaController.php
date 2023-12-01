<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FechaController extends Controller
{
    public function mostrarFecha()
    {
        $fecha = now(); // Obtiene la fecha actual

        return view('mostrar-fecha', compact('fecha'));
    }
}

