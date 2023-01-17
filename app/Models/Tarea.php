<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    public $timestamps = false;
    protected $fillable = [
        'id', 'cliente', 'persona', 'telefono', 'descripcion', 'correo', 'direccion', 'poblacion',
        'codigoPostal', 'provincia', 'operarioEncargado', 'estado', 'fecha'];
}
