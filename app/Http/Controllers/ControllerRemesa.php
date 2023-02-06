<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;

class ControllerRemesa extends Controller
{

    public function __invoke(Request $request)
    {
        return view('formularioRemesa');
    }

    public function validacionInsertarRemesa()
    {
        $data = request()->validate([
            'concepto' => 'required',
            'fechaEmision' => 'required',
            'notas' => 'required',
        ]);

        $clientes = Cliente::all();

        foreach ($clientes as $cliente) {
            $data['clientes_id'] = $cliente->id;
            $data['importe'] = $cliente->importe;
            Cuota::create($data);
        }

        session()->flash('message', 'La cuota ha sido creada correctamente.');
        return redirect()->route('listaCuotas');
    }
}
