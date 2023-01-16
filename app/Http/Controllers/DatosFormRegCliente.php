<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosFormRegCliente extends Controller
{
    public function Validation()
    {
        request()->validate([
            'cif' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'cuenta' => 'required',
            'pais' => 'required',
            'moneda' => 'required',
            'cuota' => 'required',
        ]);
        return view('formRegCliente');
    }
}
