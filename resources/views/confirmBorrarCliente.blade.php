@section('titulo', 'Confirmación de borrado del cliente')

@extends('template')

@section('contenido')

    <h1> ¿Estás seguro de que quieres borrar el cliente {{ $cliente->nombre }}? </h1>

    <br>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-warning">
                    <tr>
                        <th scope="col">CIF</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Importe</th>
                        <th scope="col">País</th>
                        <th scope="col">Moneda</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $cliente->cif }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->cuenta }}</td>
                        <td>{{ $cliente->importe }}</td>
                        <td>
                            @if ($cliente->pais)
                                {{ $cliente->pais->nombre }}
                            @else
                                Empleado dado de baja
                            @endif
                        </td>
                        <td>{{ $cliente->moneda }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <form action="{{ route('borrarCliente', $cliente) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Borrar</button>
                <a class="btn btn-secondary" href="{{ route('listaClientes') }}"><i class="bi bi-backspace"></i> Volver atrás</a>
            </form>
        </div>
    </div>

@endsection
