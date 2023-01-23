@section('titulo', 'Confirmación de borrado del empleado')

@extends('template')

@section('contenido')

    <h1> ¿Estás seguro de que quieres borrar el empleado {{ $empleado->id }}? </h1>

    <br>

    <div id="cuerpo">
        <div class="table-responsive">
            <div id="cuerpo">
                <table class="table table-striped table-hover">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">NIF</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Clave</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Fecha de alta</th>
                            <th scope="col">Tipo de empleado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $empleado->nif }}</td>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->clave }}</td>
                            <td>{{ $empleado->correo }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td>{{ $empleado->direccion }}</td>
                            <td>{{ $empleado->fechaAlta }}</td>
                            <td>{{ $empleado->tipo }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
            <form action="{{ route('borrarEmpleado', $empleado) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Borrar</button>
                <a class="btn btn-info" href="{{ route('listaEmpleados') }}">🡰 Volver atrás</a>
            </form>
        </div>
        </div>
    @endsection
