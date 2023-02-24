@section('titulo', 'Lista de cuotas')

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
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <h1>Lista de cuotas</h1>
    <hr>
    <br>

    <div class="d-flex flex-column align-items-center w-50 mx-auto">
        <h3 class="text-center">Filtros:</h3>
        <div class="d-flex justify-content-center">
            <a class="btn btn-outline-primary" href="{{ route('listaCuotas', ['fechaEmision']) }}">Fecha de Emisión</a>&nbsp;
            <a class="btn btn-outline-primary" href="{{ route('listaCuotas', ['fechaPago']) }}">Fecha de Pago</a>&nbsp;
            <a class="btn btn-outline-primary" href="{{ route('listaCuotas', ['SI']) }}">Pagadas</a>&nbsp;
            <a class="btn btn-outline-primary" href="{{ route('listaCuotas', ['NO']) }}">No pagadas</a>&nbsp;
        </div>
    </div>
    <br>
    <div id="cuerpo">
        <table class="table table-striped table-hover">
            <thead class="table-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Fecha de emisión</th>
                    <th scope="col">Importe</th>
                    <th scope="col">Fecha de pago</th>
                    <th scope="col">Notas</th>
                    <th scope="col">Pagada</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuotas as $cuota)
                    @if (!is_null($cuota->cliente) && is_null($cuota->cliente->deleted_at))
                        <tr>
                            <td>{{ $cuota->id }}</td>
                            <td>{{ $cuota->cliente->cif }}</td>
                            <td>{{ $cuota->concepto }}</td>
                            <td>{{ date('d-m-Y', strtotime($cuota->fechaEmision)) }}</td>
                            <td>{{ $cuota->importe }} {{ $cuota->cliente->moneda }}</td>
                            <td>{{ !empty($cuota->fechaPago) ? date('d-m-Y', strtotime($cuota->fechaPago)) : ' ' }}</td>
                            <td>{{ $cuota->notas }}</td>
                            <td>{{ $cuota->pagada }}</td>
                            <td><a class="btn btn-warning" href="{{ route('editarCuota', $cuota) }}"><i
                                        class="bi bi-pencil"></i></a>
                                <a class="btn btn-danger" href="{{ route('confirmBorrarCuota', $cuota) }}"><i
                                        class="bi bi-trash3-fill"></i></a>
                                <a class="btn btn-success" href="{{ route('generarfactura', $cuota->id) }}"><i
                                        class="bi bi-filetype-pdf"></i></a>
                                <a class="btn btn-primary" href="{{ route('formularioPaypal') }}"><i
                                    class="bi bi-paypal"></i></a>
                                <a class="btn btn-dark" href="{{ route('facturaCorreo', $cuota->id) }}"><i class="bi bi-send-plus"></i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div id="paginacion">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $cuotas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->url(1) }}">Primera</a>
                    </li>
                    <li class="page-item {{ $cuotas->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->previousPageUrl() }}">Anterior</a>
                    </li>
                    @for ($i = 1; $i <= $cuotas->lastPage(); $i++)
                        <li class="page-item {{ $cuotas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $cuotas->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $cuotas->currentPage() == $cuotas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->nextPageUrl() }}">Siguiente</a>
                    </li>
                    <li class="page-item {{ $cuotas->currentPage() == $cuotas->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $cuotas->url($cuotas->lastPage()) }}">Última</a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
@endsection
