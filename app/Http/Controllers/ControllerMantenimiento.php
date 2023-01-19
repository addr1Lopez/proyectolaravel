<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMantenimiento extends Controller
{
    public function __invoke(Request $request)
    {
        return view('formMantenimiento');
    }

    public function validacionInsertar()
    {
        request()->validate([
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required',
            'fechaPago' => 'required',
            'notas' => 'required',
            'pagada' => 'required',
        ]);
        return view('formMantenimiento');
    }
}
