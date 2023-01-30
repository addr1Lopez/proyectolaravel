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

    public function listar()
    {
        $empleados = Empleado::orderBy('fechaAlta', 'desc')->paginate(5);
        return view('listaEmpleados', compact('empleados'));
    }

    public function confirmacionBorrar(Empleado $empleado)
    {
        return view('confirmBorrarEmpleado', compact('empleado'));
    }

    public function borrarEmpleado(Empleado $empleado)
    {
        $empleado->delete();
        session()->flash('message', 'El empleado se ha borrado exitosamente');
        return redirect()->route('listaEmpleados');
    }

    public function editarEmpleado(Empleado $empleado)
    {
        return view('editarEmpleado', compact('empleado'));
    }

    public function actualizarEmpleado(Empleado $empleado)
    {
        $validacion = request()->validate([
            'nif' => 'required',
            'nombre' => 'required',
            'clave' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'direccion' => 'required',
            'fechaAlta' => 'required|after:now',
            'tipo' => 'required',            
        ]);
        
        Empleado::where('id', $empleado->id)->update($validacion);
        session()->flash('message', 'Empleado modificado con éxito');
        return redirect()->route('listaEmpleados');
    }
}
