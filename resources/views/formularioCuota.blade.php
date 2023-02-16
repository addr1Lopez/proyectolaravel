@section('titulo', 'Formulario Cuota Excepcional')

@extends('template')

@section('linkScript')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.form-select').select2();
        });
    </script>

@endsection


@section('contenido')

    <form action="{{ route('formularioCuota') }}" method="post" class="row g-3" id="formulario">
        <h1> Formulario Cuota Excepcional </h1>
        <hr>
        @csrf
        <div class="col-md-3">
            <label class="form-label">Cliente: </label>
            <select class="form-select" name="clientes_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('clientes_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="concepto" class="form-label">Concepto:</label>
            <input class="form-control" type="text" name="concepto" value="{{ old('concepto') }}" placeholder="Concepto">
            {!! $errors->first('concepto', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="fechaEmision" class="form-label">Fecha de emisión:</label>
            <input class="form-control" type="date" name="fechaEmision" value="{{ old('fechaEmision') }}">
            {!! $errors->first('fechaEmision', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="importe" class="form-label">Importe:</label>
            <textarea class="form-control" name="importe" id="importe" cols="30" rows="4">{{ old('importe') }}</textarea>
            {!! $errors->first('importe', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-md-3">
            <label for="notas" class="form-label">Notas:</label>
            <textarea class="form-control" name="notas" id="notas" cols="30" rows="4">{{ old('notas') }}</textarea>
            {!! $errors->first('notas', '<b style="color: red">:message</b>') !!}
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-danger" href="{{ route('listaCuotas') }}"><i class="bi bi-backspace"></i> Volver a cuotas</a>
        </div>

    </form>

@endsection
