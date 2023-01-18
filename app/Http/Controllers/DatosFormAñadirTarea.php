<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class DatosFormAñadirTarea extends Controller
{
    public function Validation()
    {
        $datos = request()->validate([
            'cliente' => 'required',
            'persona' => 'required',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'descripcion' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'poblacion' => 'required',
            'codigoPostal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
            'provincia' => 'required',
            'operarioEncargado' => 'required',
            'estado' => 'required',
            'fechaRealizacion' => 'required|after:now',
        ]);
        $datos['fechaCreacion'] = (new \DateTime())->format('Y-m-d');
        Tarea::create($datos);
        session()->flash('message', 'La tarea / incidencia se ha registrado correctamente.');


        return redirect()->route('formAñadirTarea');
    }
}
