<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario; // Asegúrate de importar el modelo Comentario

class ComentarioController extends Controller
{
    public function guardar(Request $request)
    {
        // Valida y guarda el comentario
        $request->validate([
            'comment' => 'required|string|max:255', // Define tus reglas de validación aquí
        ]);

        // Guarda el comentario en la base de datos
        $nuevoComentario = new Comentario();
        $nuevoComentario->texto = $request->comment;
        $nuevoComentario->save();

        return response()->json(['success' => true, 'message' => 'Comentario guardado con éxito']);
    }
}
