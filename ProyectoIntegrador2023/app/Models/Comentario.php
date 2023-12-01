<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios'; // Nombre de la tabla en la base de datos
    protected $fillable = ['texto']; // Campos que se pueden llenar de manera masiva
}
