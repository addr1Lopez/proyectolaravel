<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Rules\CifRules;

class DatosFormRegCliente extends Controller
{
    public function Validation()
    {
        $datos = request()->validate([
            'cif' => ['required', new CifRules],
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'cuenta' => 'required',
            'importe' => 'required',
            'pais' => 'required',
            'moneda' => 'required',
        ]);

        Cliente::create($datos);
        session()->flash('message', 'El cliente ha sido registrado correctamente.');

        return redirect()->route('formRegCliente');
       
    }
}
