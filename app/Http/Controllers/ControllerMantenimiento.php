<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class ControllerMantenimiento extends Controller
{
    public function __invoke(Request $request)
    {
        $tareas = Tarea::all();
        return view('formMantenimiento', compact('tareas'));
    }

    public function validacionInsertar()
    {
        request()->validate([
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required',
            'fechaPago' => 'required',
            'notas' => 'required',
            'pagada' => '',
        ]);
        return view('formMantenimiento');
    }
}
