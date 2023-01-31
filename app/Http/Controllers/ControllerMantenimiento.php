<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Cuota;
use App\Models\Cliente;

class ControllerMantenimiento extends Controller
{
    public function __invoke(Request $request)
    {
        // $tareas = Tarea::all();
        $clientes = Cliente::all();
        return view('formMantenimiento', compact('clientes'));
    }

    public function listar()
    {
        $clientes = Cliente::all();
        $cuotas = Cuota::orderBy('fechaEmision', 'desc')->paginate(5);
        return view('listaCuotas', compact('cuotas', 'clientes'));
    }

    public function validacionInsertar()
    {
        $datos = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required|numeric',
            'fechaPago' => 'required|after:now',
            'notas' => 'required',
            'pagada' => 'required',
        ]);

        Cuota::create($datos);
        session()->flash('message', 'La cuota se ha registrado correctamente.');
        return redirect()->route('listaCuotas');
    }

    public function confirmacionBorrar(Cuota $cuota)
    {
        return view('confirmBorrarCuota', compact('cuota'));
    }

    public function borrarCuota(Cuota $cuota)
    {
        $cuota->delete();
        session()->flash('message', 'La cuota se ha borrado exitosamente');
        return redirect()->route('listaCuotas');
    }
}
