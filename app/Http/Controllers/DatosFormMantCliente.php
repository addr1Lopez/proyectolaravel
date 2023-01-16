<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosFormMantCliente extends Controller
{
    public function Validation()
    {
        request()->validate([
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required',
            'fechaPago' => 'required',
            'notas' => 'required',
            'pagada' => 'required',
        ]);
        return view('formMantCliente');
    }
}
