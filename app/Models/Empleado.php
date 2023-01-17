<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    public $timestamps = false;
    protected $fillable = ['nif', 'nombre', 'clave', 'correo', 'telefono', 'direccion', 'fechaAlta', 'tipo'];
}
