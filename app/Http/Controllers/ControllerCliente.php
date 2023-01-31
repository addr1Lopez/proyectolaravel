<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Cliente;
use App\Rules\CifRules;

class ControllerCliente extends Controller
{
    public function __invoke(Request $request)
    {
        $paises = Pais::all();
        return view('formularioCliente', compact('paises'));
    }

    public function validacionInsertar()
    {
        $datos = request()->validate([
            'cif' => ['required', new CifRules],
            'nombre' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'cuenta' => 'required|regex:/^ES\d{2}\d{4}\d{4}\d{2}\d{10}$/',
            'importe' => 'required',
            'paises_id' => 'required',
            'moneda' => 'required',
        ]);

        Cliente::create($datos);
        session()->flash('message', 'El cliente ha sido registrado correctamente.');

        return redirect()->route('listaClientes');
       
    }
    
    public function listar()
    {
        $clientes = Cliente::orderBy('nombre', 'asc')->paginate(5);
        return view('listaClientes', compact('clientes'));
    }

    public function confirmacionBorrar(Cliente $cliente)
    {
        return view('confirmBorrarCliente', compact('cliente'));
    }

    public function borrarCliente(Cliente $cliente)
    {
        $cliente->delete();
        session()->flash('message', 'El cliente se ha borrado exitosamente');
        return redirect()->route('listaClientes');
    }
}
