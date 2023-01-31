<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cliente;

class Cuota extends Model
{
    use SoftDeletes;
    protected $table = 'cuotas';
    public $timestamps = false;
    protected $fillable = ['clientes_id', 'concepto', 'fechaEmision', 'importe', 'fechaPago', 'notas', 'pagada'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }
}

