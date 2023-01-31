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
        'id', 'clientes_id', 'persona', 'telefono', 'descripcion', 'correo', 'direccion', 'poblacion',
        'codigoPostal', 'provincia', 'empleados_id', 'estado', 'fechaCreacion', 'fechaRealizacion', 'anotaciones_anteriores', 'anotaciones_posteriores'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleados_id');
    }
}
