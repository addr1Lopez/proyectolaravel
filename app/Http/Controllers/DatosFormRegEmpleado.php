<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosFormRegEmpleado extends Controller
{
    public function Validation()
    {
        request()->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'direccion' => 'required',
            'fecha' => 'required',
            'tipo' => 'required',
        ]);
    }
}
