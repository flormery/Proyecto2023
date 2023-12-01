<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informe extends Model
{
    use HasFactory;
    public function practicante()
    {
        return $this->belongsTo(Practicante::class, 'practicante_id'); // Reemplaza 'otra_tabla_id' con el nombre real de tu clave foránea
    }
}
