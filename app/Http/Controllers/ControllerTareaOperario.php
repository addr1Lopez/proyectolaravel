<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tarea;

use Illuminate\Support\Facades\Auth;


class ControllerTareaOperario extends Controller
{

    public function verDetallesOperario(Tarea $tarea)
    {
        return view('verDetalles', compact('tarea'));
    }

    public function listarTareasOperario()
    {
        $tareas = Tarea::where('empleados_id', Auth::user()->id)
            ->orderBy('fechaRealizacion', 'desc')
            ->paginate(5);
        return view('listaTareas', compact('tareas'));
    }

    public function editarCompletar(Tarea $tarea)
    {
        return view('completarTarea', compact('tarea'));
    }

    public function completarTarea(Tarea $tarea)
    {
        $validacion = request()->validate([
            'estado' => 'required',
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
        session()->flash('message', 'Tarea completada con éxito');
        return redirect()->route('listarTareasOperario');
    }
}
