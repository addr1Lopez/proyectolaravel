<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Rules\DniRule;

class ControllerEmpleado extends Controller
{
    public function __invoke(Request $request)
    {
        return view('formularioEmpleado');
    }

    public function validacionInsertar()
    {
        $datos = request()->validate([
            'nif' => ['required', new DniRule],
            'nombre' => 'required',
            'correo' => 'required|email',
            'clave' => 'required',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'direccion' => 'required',
            'fechaAlta' => 'required',
            'tipo' => 'required',
        ]);

        Empleado::create($datos);
        session()->flash('message', 'El empleado ha sido registrado correctamente.');

        //return request();
        return redirect()->route('formularioEmpleado');
        //return view('formAñadirTarea');
    }
}
