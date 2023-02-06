@section('titulo', 'Modificación de la cuota')

@extends('template')

@section('contenido')

    <form class="row g-3" action="{{ route('actualizarCuota', $cuota) }}" method="POST">
        @csrf
        <h1> Modificación de la cuota: </h1>
        @method('PUT')
        <div class="col-md-3">
            <label class="form-label">Cliente:</label>
            <select class="form-select" name="clientes_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                        {{ old('clientes_id') == $cliente->id ? 'selected' : ($cuota->clientes_id == $cliente->id ? 'selected' : '') }}>
                        {{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="concepto" class="form-label">Concepto:</label>
            <input class="form-control" type="text" name="concepto" value="{{ old('concepto') ?? $cuota->concepto }}"
                placeholder="Concepto">
            {!! $errors->first('concepto', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="fechaEmision" class="form-label">Fecha de emisión:</label>
            <input class="form-control" type="date" name="fechaEmision"
                value="{{ old('fechaEmision') ?? $cuota->fechaEmision }}">
            {!! $errors->first('fechaEmision', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="importe" class="form-label">Importe:</label>
            <input class="form-control" type="text" name="importe" value="{{ old('importe') ?? $cuota->importe }}"
                placeholder="Importe">
            {!! $errors->first('concepto', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="pagada" class="form-label">Pagada: </label>
            <select name="pagada" id="pagada" class="form-select">
                <option value="SI"
                    {{ old('pagada') == 'SI' ? 'selected' : ($cuota->pagada == 'SI' ? 'selected' : '') }}>
                    SI</option>
                <option value="NO"
                    {{ old('pagada') == 'NO' ? 'selected' : ($cuota->pagada == 'NO' ? 'selected' : '') }}>
                    NO</option>
            </select>
            {!! $errors->first('pagada', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="fechaPago" class="form-label">Fecha de pago:</label>
            <input type="date" name="fechaPago" class="form-control" value="{{ old('fechaPago') ?? $cuota->fechaPago }}">
            {!! $errors->first('fechaPago', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="notas" class="form-label">Notas:</label>
            <textarea class="form-control" name="notas" id="notas" cols="30" rows="4">{{ old('notas') ?? $cuota->notas }}</textarea>
            {!! $errors->first('notas', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">✏️ Actualizar</button>
            <a class="btn btn-danger" href="{{ route('listaCuotas', 'fechaEmision') }}">
                🡰 Volver atrás</a>
        </div>
    </form>




@endsection
