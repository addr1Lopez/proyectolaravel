<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarea extends Model
{
    use SoftDeletes;
    protected $table = 'tareas';
    public $timestamps = false;
    protected $fillable = [
        'id', 'cliente', 'persona', 'telefono', 'descripcion', 'correo', 'direccion', 'poblacion',
        'codigoPostal', 'provincia', 'operarioEncargado', 'estado', 'fechaCreacion', 'fechaRealizacion', 'anotaciones_anteriores', 'anotaciones_posteriores'];
}
