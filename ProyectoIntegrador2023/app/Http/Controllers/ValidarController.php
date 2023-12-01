<?php

namespace App\Http\Controllers;

use App\Models\informe;
use Illuminate\Http\Request;

class ValidarController extends Controller
{
    public function cambiarValorValido($id)
    {
        // Lógica para cambiar el valor en la tabla
        $informe = informe::findOrFail($id); // Reemplaza TuModelo con el nombre de tu modelo
        $informe->estado = 'Valido';
        $informe->save();

        return redirect()->back()->with('success', 'Estado cambiado exitosamente');
         // Redirigir a la página anterior o a donde desees
    }
}
