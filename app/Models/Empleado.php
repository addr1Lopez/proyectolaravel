<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'empleados';
    public $timestamps = false;
    protected $fillable = ['nif', 'nombre', 'password', 'email', 'telefono', 'direccion', 'fechaAlta', 'tipo'];
}
