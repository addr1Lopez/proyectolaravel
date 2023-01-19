@section('titulo', 'Listado de tareas:')

@extends('template')

@section('contenido')

    <style>
        .botonAtras {
            display: grid; /* Establece el div como una cuadrícula */
            place-items: center; /* Centra el elemento en ambos ejes */
        }
    </style>
    <h1>Detalles de la tarea {{ $tarea->id }} </h1>
    <div id="cuerpo">
        <table class="table table-striped table-hover">
            <thead class="table-warning">
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
                    <td>{{ $tarea->cliente }}</td>
                    <td>{{ $tarea->persona }}</td>
                    <td>{{ $tarea->telefono }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>{{ $tarea->correo }}</td>
                    <td>{{ $tarea->direccion }}</td>
                    <td>{{ $tarea->poblacion }}</td>
                    <td>{{ $tarea->codigoPostal }}</td>
                    <td>{{ $tarea->provincia }}</td>
                    <td>{{ $tarea->operarioEncargado }}</td>
                    <td>{{ $tarea->estado }}</td>
                    <td>{{ $tarea->fechaRealizacion }}</td>
                </tr>
            </tbody>
        </table>
        <div class="botonAtras">
            <a class="btn btn-danger" href="{{ route('listaTareas') }}">🡰 Volver atrás</a>
        </div>
    </div>

@endsection
