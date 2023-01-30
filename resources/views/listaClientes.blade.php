@section('titulo', 'Lista de clientes')

@extends('template')

<style>
    #paginacion {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h1 {
        text-align: center;
    }
</style>

@section('contenido')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h1>Lista de clientes</h1>
    <br>
    <div id="cuerpo">
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
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->cif }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->cuenta }}</td>
                        <td>{{ $cliente->importe }}</td>
                        <td>{{ $cliente->pais }}</td>
                        <td>{{ $cliente->moneda }}</td>
                        <td>
                            <a class="btn btn-danger" href=" {{ route('confirmBorrarCliente', $cliente) }}">🗑️</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $clientes->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $clientes->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->previousPageUrl() }}">Anterior</a>
                    </li>
                    @for ($i = 1; $i <= $clientes->lastPage(); $i++)
                        <li class="page-item {{ $clientes->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $clientes->currentPage() == $clientes->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->nextPageUrl() }}">Siguiente</a>
                    </li>
                    <li class="page-item {{ $clientes->currentPage() == $clientes->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $clientes->url($clientes->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
@endsection
