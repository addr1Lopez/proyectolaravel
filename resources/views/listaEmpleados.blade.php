@section('titulo', 'Lista de empleados')

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
    <h1>Lista de empleados</h1>
    <hr>
    <br>
    <div id="cuerpo">
        <table class="table table-striped table-hover">
            <thead class="table-info">
                <tr>
                    <th scope="col">NIF</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Fecha de alta</th>
                    <th scope="col">Tipo de empleado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->nif }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->direccion }}</td>
                        <td>{{ date('d-m-Y', strtotime($empleado->fechaAlta)) }}</td>
                        <td>{{ $empleado->tipo }}</td>
                        <td><a class="btn btn-warning" href="{{ route('editarEmpleado', $empleado) }}"><i
                                    class="bi bi-pencil"></i></a>
                            <a class="btn btn-danger" href=" {{ route('confirmBorrarEmpleado', $empleado) }}"><i
                                    class="bi bi-trash3-fill"></i></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $empleados->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $empleados->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->previousPageUrl() }}">Anterior</a>
                    </li>
                    @for ($i = 1; $i <= $empleados->lastPage(); $i++)
                        <li class="page-item {{ $empleados->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $empleados->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $empleados->currentPage() == $empleados->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->nextPageUrl() }}">Siguiente</a>
                    </li>
                    <li class="page-item {{ $empleados->currentPage() == $empleados->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $empleados->url($empleados->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
@endsection
