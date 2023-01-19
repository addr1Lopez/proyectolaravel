@section('titulo', 'Listado de tareas:')

@extends('template')

<style>
    #paginacion {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #cuerpo {
        margin: 2em;
    }
</style>

@section('contenido')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <h1>Listado de tareas</h1>
    <div id="cuerpo">
        <table class="table table-striped table-hover">
            <thead class="table-warning">
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
                        <td>{{ $tarea->cliente }}</td>
                        <td>{{ $tarea->persona }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->direccion }}</td>
                        <td>{{ $tarea->poblacion }}</td>
                        <td>{{ $tarea->operarioEncargado }}</td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->fechaRealizacion }}</td>
                        <td><a class="btn btn-info" href="{{ route('verDetalles', $tarea) }}">🔍 Ver Detalles</a>&nbsp;
                            <a class="btn btn-warning" href="#">✏️ Modificar</a>
                            <a class="btn btn-danger" href="{{ route('confirmBorrarTarea', $tarea)}}"><i class="bi bi-trash3-fill"></i>🗑️ Borrar</a>&nbsp;
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $tareas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->previousPageUrl() }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $tareas->lastPage(); $i++)
                        <li class="page-item {{ $tareas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $tareas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $tareas->currentPage() == $tareas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $tareas->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
