@section('titulo', 'Listado de tareas:')

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
    <h1>Lista de tareas</h1>
    <hr>
    <br>
    <div id="cuerpo">
        <table class="table table-striped table-hover">
            <thead class="table-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Persona</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Población</th>
                    <th scope="col">Operario Encargado</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha de realización</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->cliente->cif }}</td>
                        <td>{{ $tarea->persona }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->direccion }}</td>
                        <td>{{ $tarea->poblacion }}</td>
                        {{-- <td>{{ $tarea->empleados->id }}</td> --}}
                        <td>
                            @if ($tarea->empleado)
                                {{ $tarea->empleado->nif }}
                            @else
                                Empleado no asignado
                            @endif
                        </td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->fechaRealizacion }}</td>
                        <td>
                            @if (Auth::check() && Auth::user()->tipo === 1)
                                <a class="btn btn-primary" href="{{ route('verDetallesOperario', $tarea) }}"><i
                                        class="bi bi-search"></i></a>
                                <a class="btn btn-success" href="{{ route('completarTarea', $tarea) }}"><i
                                        class="bi bi-folder-plus"></i></a>
                            @endif
                            @if (Auth::check() && Auth::user()->tipo === 0)
                                <a class="btn btn-primary" href="{{ route('verDetalles', $tarea) }}"><i
                                        class="bi bi-search"></i></a>
                                <a class="btn btn-warning" href="{{ route('editarTarea', $tarea) }}"><i
                                        class="bi bi-pencil"></i></a>
                                <a class="btn btn-danger" href="{{ route('confirmBorrarTarea', $tarea) }}"><i
                                        class="bi bi-trash3-fill"></i></a>
                        </td>
                @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $tareas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $tareas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->previousPageUrl() }}">Anterior</a>
                    </li>
                    @for ($i = 1; $i <= $tareas->lastPage(); $i++)
                        <li class="page-item {{ $tareas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tareas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $tareas->currentPage() == $tareas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->nextPageUrl() }}">Siguiente</a>
                    </li>
                    <li class="page-item {{ $tareas->currentPage() == $tareas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->url($tareas->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
@endsection
