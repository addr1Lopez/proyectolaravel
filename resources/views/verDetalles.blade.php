@section('titulo', 'Listado de tareas:')

@extends('template')

@section('contenido')

    <style>
        .botonAtras {
            /* display: grid;
                                                // Establece el div como una cuadrícula
                                                place-items: center;
                                                // Centra el elemento en ambos ejes */
            position: absolute;
            left: 10;
            float: left;
        }

        #cuerpo {
            margin-left: 35%;
            margin-right: 35%;
        }

        h1 {
            text-align: center;
        }
    </style>
    
    @if (Auth::check() && Auth::user()->tipo === 1)
    <div class="botonAtras">
        <a class="btn btn-danger" href="{{ route('listarTareasOperario') }}"><i class="bi bi-backspace"></i> Volver atrás</a>
    </div>
    @endif

    @if (Auth::check() && Auth::user()->tipo === 0)
    <div class="botonAtras">
        <a class="btn btn-danger" href="{{ route('listaTareas') }}"><i class="bi bi-backspace"></i> Volver atrás</a>
    </div>
    @endif

    <h1>Detalles de la tarea {{ $tarea->id }} </h1>
    <br>
    <div id="cuerpo">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td><b>Cliente</b></td>
                    <td>
                        @if ($tarea->cliente)
                            {{ $tarea->cliente->cif }}
                        @else
                            Cliente dado de baja
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b>Persona</b></td>
                    <td>{{ $tarea->persona }}</td>
                </tr>
                <tr>
                    <td><b>Teléfono</b></td>
                    <td>{{ $tarea->telefono }}</td>
                </tr>
                <tr>
                    <td><b>descripción</b></td>
                    <td>{{ $tarea->descripcion }}</td>
                </tr>
                <tr>
                    <td><b>Correo</b></td>
                    <td>{{ $tarea->correo }}</td>
                </tr>
                <tr>
                    <td><b>Dirección</b></td>
                    <td>{{ $tarea->direccion }}</td>
                </tr>
                <tr>
                    <td><b>Población</b></td>
                    <td>{{ $tarea->poblacion }}</td>
                </tr>
                <tr>
                    <td><b>Código Postal</b></td>
                    <td>{{ $tarea->codigoPostal }}</td>
                </tr>
                <tr>
                    <td><b>Provincia</b></td>
                    <td>{{ $tarea->provincia }}</td>
                </tr>
                <tr>
                    <td><b>Operario Encargado</b></td>
                    <td>
                        @if ($tarea->empleado)
                            {{ $tarea->empleado->nif }}
                        @else
                            Empleado dado de baja
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><b>Estado</b></td>
                    <td>{{ $tarea->estado }}</td>
                </tr>
                <tr>
                    <td><b>Fecha de realización</b></td>
                    <td>{{ $tarea->fechaRealizacion }}</td>
                </tr>
                <tr>
                    <td><b>Anotaciones anteriores</b></td>
                    <td>{{ $tarea->anotaciones_anteriores }}</td>
                </tr>
                <tr>
                    <td><b>Anotaciones posteriores</b></td>
                    <td>{{ $tarea->anotaciones_posteriores }}</td>
                </tr>
                <tr>
                    <td><b>Fichero</b></td>
                    <td>
                        @if ($tarea->fichero)
                            <a class="btn btn-primary"
                                href="{{ Storage::url('public/files/' . $tarea->fichero) }}"download="{{ basename($tarea->fichero) }}">{{ $tarea->fichero }}</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection
