@section('titulo', 'Confirmación de borrado de la cuota')

@extends('template')

@section('contenido')

    <h1> ¿Estás seguro de que quieres borrar la cuota {{ $cuota->id }}? </h1>

    <br>

    <div id="cuerpo">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Tarea</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Fecha de emisión</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Fecha de pago</th>
                        <th scope="col">Notas</th>
                        <th scope="col">Pagada</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $cuota->tarea }}</td>
                        <td>{{ $cuota->concepto }}</td>
                        <td>{{ $cuota->fechaEmision }}</td>
                        <td>{{ $cuota->importe }}</td>
                        <td>{{ $cuota->fechaPago }}</td>
                        <td>{{ $cuota->notas }}</td>
                        <td>{{ $cuota->pagada }}</td>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <form action="{{ route('borrarCuota', $cuota) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Borrar</button>
                <a class="btn btn-info" href="{{ route('listaCuotas') }}">🡰 Volver atrás</a>
            </form>
        </div>
    </div>


@endsection
