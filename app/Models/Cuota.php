<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = 'cuotas';
    public $timestamps = false;
    protected $fillable = ['tarea', 'concepto', 'fechaEmision', 'importe', 'fechaPago', 'notas', 'pagada'];
}
