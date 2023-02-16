@section('titulo', 'Confirmación de borrado de la tarea')

@extends('template')

@section('contenido')

    <h1> ¿Estás seguro de que quieres borrar la tarea {{ $tarea->id }}? </h1>

    <br>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Persona</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Población</th>
                        <th scope="col">Codigo postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Operario Encargado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de realización</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>
                            @if ($tarea->cliente)
                                {{ $tarea->cliente->cif }}
                            @else
                                Cliente dado de baja
                            @endif
                        </td>
                        <td>{{ $tarea->persona }}</td>
                        <td>{{ $tarea->telefono }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->correo }}</td>
                        <td>{{ $tarea->direccion }}</td>
                        <td>{{ $tarea->poblacion }}</td>
                        <td>{{ $tarea->codigoPostal }}</td>
                        <td>{{ $tarea->provincia }}</td>
                        <td>
                            @if ($tarea->empleado)
                                {{ $tarea->empleado->nif }}
                            @else
                                Empleado dado de baja
                            @endif
                        </td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->fechaRealizacion }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <form action="{{ route('borrarTarea', $tarea) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Borrar</button>
                <a class="btn btn-secondary" href="{{ route('listaTareas') }}"><i class="bi bi-backspace"></i> Volver atrás</a>
            </form>
        </div>
    </div>


    @endsection
