<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Tarea;


class ControllerTarea extends Controller
{
    public function formularioInsertar(Request $request)
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $provincias = Provincia::all();
        return view('formularioTarea', compact('empleados', 'clientes', 'provincias'));
    }

    public function listar()
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all(); {
        $tareas = Tarea::whereHas('cliente', function ($query) {
                $query->whereNull('clientes.deleted_at');
            })
                ->orderBy('fechaRealizacion', 'desc')
                ->paginate(10);

            return view('listaTareas', compact('tareas', 'clientes', 'empleados'));
        }
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
            'clientes_id' => 'required',
            'persona' => 'required',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'descripcion' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'poblacion' => 'required',
            'codigoPostal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
            'provincia' => 'required',
            'empleados_id' => 'required',
            'estado' => 'required',
            'fechaRealizacion' => 'required|after:now',
        ]);
        $datos['fechaCreacion'] = (new \DateTime())->format('Y-m-d');
        Tarea::create($datos);
        session()->flash('message', 'La tarea se ha registrado correctamente.');

        return redirect()->route('listaTareas');
    }


    public function editar(Tarea $tarea)
    {
        $clientes = Cliente::all();
        $provincias = Provincia::all();
        $empleados = Empleado::all();
        return view('editarTarea', compact('tarea', 'clientes', 'provincias', 'empleados'));
    }

    public function actualizar(Tarea $tarea)
    {
        $validacion = request()->validate([
            'clientes_id' => 'required',
            'persona' => 'required',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'descripcion' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'poblacion' => 'required',
            'codigoPostal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
            'provincia' => 'required',
            'empleados_id' => 'required',
            'estado' => 'required',
            'fechaRealizacion' => 'required|after:now',
            'anotaciones_anteriores' => '',
            'anotaciones_posteriores' => '',
            'fichero' => 'file'
        ]);

        if (request()->hasFile('fichero')) {
            $fichero = request()->file('fichero');
            $nombre_original = $fichero->getClientOriginalName();
            $path = $fichero->storeAs('public/files', $nombre_original);

            $validacion['fichero'] = $nombre_original;
        }

        Tarea::where('id', $tarea->id)->update($validacion);
        session()->flash('message', 'Tarea actualizada con éxito');
        return redirect()->route('listaTareas');
    }


    public function validacionClienteInsertar()
    {
        $datos = request()->validate([
            'clienteCif' => 'required',
            'telefonoCliente' => 'required',
            'clientes_id' => '',
            'persona' => 'required',
            'telefono' => 'required|regex:/^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$/',
            'correo' => 'required|email',
            'descripcion' => 'required',
            'direccion' => 'required',
            'poblacion' => 'required',
            'codigoPostal' => ['required', 'regex:/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/'],
            'provincia' => 'required',
            'estado' => '',
            'empleados_id' => '',
            'fechaRealizacion' => 'required|after:now',
        ]);

        $cliente = Cliente::where('cif', $datos['clienteCif'])
            ->where('telefono', $datos['telefonoCliente'])
            ->first();

        //dd($cliente);

        if (
            $cliente != null
        ) {
            // Quitamos el cif y telefono del cliente ya que solo los necesitamos para la comprobacion
            unset($datos['clienteCif']);
            unset($datos['telefonoCliente']);

            $datos['fechaCreacion'] = (new \DateTime())->format('Y-m-d');
            $datos['estado'] = "P";
            $datos['clientes_id'] = $cliente->id;

            Tarea::create($datos);
            session()->flash('message', 'La tarea se ha registrado correctamente.');
            return redirect()->route('formularioTareaClientes');
        }
        session()->flash('error', 'La tarea no se ha podido registrar.');
        return redirect()->route('formularioTareaClientes');
    }

    public function formularioTareaClientes(Request $request)
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $provincias = Provincia::all();
        return view('formularioTareaClientes', compact('empleados', 'clientes', 'provincias'));
    }
}
