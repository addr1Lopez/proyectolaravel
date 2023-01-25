@section('titulo', 'Listado de tareas:')

@extends('template')

@section('contenido')

    <style>
        .botonAtras {
            display: grid;
            /* Establece el div como una cuadrícula */
            place-items: center;
            /* Centra el elemento en ambos ejes */
        }
        #cuerpo{
            margin-left: 35%;
            margin-right: 35%;
        }
        h1 {
            text-align: center;
        }
    </style>
    <br>
    <h1>Detalles de la tarea {{ $tarea->id }} </h1>
    <br>
    <div id="cuerpo">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td>Cliente</td>
                    <td>{{ $tarea->cliente }}</td>
                </tr>
                <tr>
                    <td>Persona</td>
                    <td>{{ $tarea->persona }}</td>
                </tr>
                <tr>
                    <td>Teléfono</td>
                    <td>{{ $tarea->telefono }}</td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td>{{ $tarea->descripcion }}</td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td>{{ $tarea->correo }}</td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td>{{ $tarea->direccion }}</td>
                </tr>
                <tr>
                    <td>Población</td>
                    <td>{{ $tarea->poblacion }}</td>
                </tr>
                <tr>
                    <td>Codigo postal</td>
                    <td>{{ $tarea->codigoPostal }}</td>
                </tr>
                <tr>
                    <td>Provincia</td>
                    <td>{{ $tarea->provincia }}</td>
                </tr>
                <tr>
                    <td>Operario Encargado</td>
                    <td>{{ $tarea->operarioEncargado }}</td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td>{{ $tarea->estado }}</td>
                </tr>
                <tr>
                    <td>Fecha de realización</td>
                    <td>{{ $tarea->fechaRealizacion }}</td>
                </tr>
                <tr>
                    <td>Anotaciones anteriores</td>
                    <td>{{ $tarea->anotaciones_anteriores }}</td>
                </tr>
                <tr>
                    <td>Anotaciones posteriores</td>
                    <td>{{ $tarea->anotaciones_posteriores }}</td>
                </tr>
            </tbody>
        </table>
        
        <div class="botonAtras">
            <a class="btn btn-danger" href="{{ route('listaTareas') }}">🡰 Volver atrás</a>
        </div>
    </div>

@endsection
