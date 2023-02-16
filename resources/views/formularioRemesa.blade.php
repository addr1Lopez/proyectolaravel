@section('titulo', 'Formulario Remesa Mensual')

@extends('template')

@section('contenido')

    <form action="{{ route('formularioRemesa') }}" method="post" class="row g-3" id="formulario">
        <h1> Remesa Mensual </h1>
        <hr>
        @csrf
        <div class="col-md-3">
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
