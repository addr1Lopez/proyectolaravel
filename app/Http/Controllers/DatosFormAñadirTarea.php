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
            'telefono' => 'required',
            'descripcion' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'poblacion' => 'required',
            'codigoPostal' => 'required',
            'provincia' => 'required',
            'operarioEncargado' => 'required',
            'estado' => 'required',
            'fecha' => 'required',
        ]);
        Tarea::create($datos);
        session()->flash('message', 'El cliente ha sido registrado correctamente.');

      
        return redirect()->route('formAñadirTarea');
    }
}
