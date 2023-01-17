<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Provincia;

class ControllerFormAñadirTarea extends Controller
{
    public function __invoke(Request $request)
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $provincias = Provincia::all();
        return view('formAñadirTarea', compact('empleados', 'clientes', 'provincias'));
    }
}
