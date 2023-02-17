<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use App\Models\Tarea;

class ControllerCuotas extends Controller
{
    public function __invoke(Request $request)
    {
        $clientes = Cliente::all();
        return view('formularioCuota', compact('clientes'));
    }

    public function listar($filtro = "")
    {
        // $clientes = Cliente::all();
        // $cuotas = Cuota::orderBy('fechaEmision', 'desc')->paginate(3);
        // return view('listaCuotas', compact('cuotas', 'clientes'));
        $tareas = Tarea::all();
        switch ($filtro) {
            case "NO":
                $cuotas = Cuota::where('pagada', 'NO')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->orderBy('fechaEmision', 'asc')
                    ->paginate(5);
                break;
            case "SI":
                $cuotas = Cuota::where('pagada', 'SI')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->orderBy('fechaEmision', 'asc')
                    ->paginate(5);
                break;
            case "fechaPago":
                $cuotas = Cuota::orderBy('fechaPago', 'desc')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->paginate(5);
                break;
            default:
                $cuotas = Cuota::orderBy('fechaEmision', 'desc')
                    ->whereHas('cliente', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->paginate(5);
                break;
        }
        return view('listaCuotas', compact('cuotas', 'tareas'));
    }

    public function validarCuotaExcepcional()
    {
        $data = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'fechaEmision' => 'required|after:now',
            'importe' => 'required|numeric',
            'notas' => 'required',
        ]);

        Cuota::create($data);

        session()->flash('message', 'La cuota ha sido creada correctamente.');

        return redirect()->route('listaCuotas', 'fechaEmision');
    }

    public function confirmacionBorrar(Cuota $cuota)
    {
        return view('confirmBorrarCuota', compact('cuota'));
    }

    public function borrarCuota(Cuota $cuota)
    {
        $cuota->delete();
        session()->flash('message', 'La cuota se ha borrado exitosamente');
        return redirect()->route('listaCuotas', 'fechaEmision');
    }

    public function editarCuota(Cuota $cuota)
    {
        $clientes = Cliente::all();
        return view('editarCuota', compact('cuota', 'clientes'));
    }

    public function actualizarCuota(Cuota $cuota)
    {
        $validacion = request()->validate([
            'clientes_id' => 'required',
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'importe' => 'required|numeric',
            'fechaPago' => '',
            'notas' => 'required',
            'pagada' => '',
        ]);

        Cuota::where('id', $cuota->id)->update($validacion);
        session()->flash('message', 'Cuota modificado con éxito');
        return redirect()->route('listaCuotas', 'fechaEmision');
    }
}
