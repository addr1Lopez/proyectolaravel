<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Tarea;


class ControllerTarea extends Controller
{
    public function __invoke(Request $request)
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $provincias = Provincia::all();
        return view('formularioTarea', compact('empleados', 'clientes', 'provincias'));
    }

    public function listar()
    {
        $tareas = Tarea::orderBy('fechaRealizacion', 'desc')->paginate(7);
        return view('listaTareas', compact('tareas'));
    }

    public function verDetalles(Tarea $tarea)
    {
        return view('verDetalles', compact('tarea'));
    }


    public function confirmacionBorrar(Tarea $tarea)
    {
        return view('confirmBorrarTarea', compact('tarea'));
    }

    public function borrarTarea(Tarea $tarea)
    {
        $tarea->delete();
        session()->flash('message', 'La tarea se ha borrado exitosamente');
        return redirect()->route('listaTareas');
    }

    public function validacionInsertar()
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


        return redirect()->route('formularioTarea');
    }
}
