<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Tarea;


class ControllerFormAñadirTarea extends Controller
{
    public function __invoke(Request $request)
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $provincias = Provincia::all();
        return view('formAñadirTarea', compact('empleados', 'clientes', 'provincias'));
    }

    public function listar()
    {
        $tareas = Tarea::orderBy('fechaRealizacion', 'desc')->paginate(3);
        return view('listarTareas', compact('tareas'));
    }

    public function confirmacionBorrar(Request $request)
    {
        $tarea = Tarea::find($request->id);
        return view('confirmBorrarTarea')->with('tarea', $tarea);
    }


    public function borrarTarea(Request $request)
    {
        Tarea::find($request->id)->delete();
        //$tareas = Tarea::orderBy('fechaRealizacion', 'desc')->paginate(3);
        session()->flash('message', 'La tarea se ha borrado exitosamente');
        return redirect()->route('listarTareas');
        //return view('listarTareas', compact('tareas')); Cambiar esto porque si no cuando borras una tarea y vuelves al listar tarea y cambiar de pagina, peta
    }
}
