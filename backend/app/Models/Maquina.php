<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'coeficiente',
    ];

    // Relación con Tareas
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'id_maquina');
    }

    // Relación con Producciones
    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'id_maquina');
    }
}
