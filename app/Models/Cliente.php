<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pais;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $table = 'clientes';
    public $timestamps = false;
    protected $fillable = ['cif', 'nombre', 'correo', 'telefono', 'cuenta', 'importe', 'paises_id', 'moneda'];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'paises_id');
    }
}
