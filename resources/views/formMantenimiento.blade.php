@section('titulo', 'Formulario de mantenimiento')

@extends('template')

@section('contenido')

    <form id="formulario" class="row g-3" method="post" action="{{ route('formMantenimiento') }}">
        @csrf
        <h1> Formulario de mantenimiento: </h1>
        <div class="col-md-3">
            <label for="clientes_id" class="form-label">Cliente:</label>
            <select class="form-select" name="clientes_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('tarea', '<span style=color:red>:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="concepto" class="form-label">Concepto</label>
            <input type="text" class="form-control" name="concepto" placeholder="Concepto" value="{{ old('concepto') }}">
            {!! $errors->first('concepto', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="fechaEmision" class="form-label">Fecha de emisión:</label>
            <input type="date" class="form-control" name="fechaEmision" placeholder="Fecha de emisión"
                value="{{ old('fechaEmision') }}">
            {!! $errors->first('fechaEmision', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="importe" class="form-label">Importe:</label>
            <input type="text" class="form-control" name="importe" placeholder="Importe" value="{{ old('importe') }}">
            {!! $errors->first('importe', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="fechaPago" class="form-label">Fecha de pago:</label>
            <input type="date" class="form-control" name="fechaPago" value="{{ old('fechaPago') }}">
            {!! $errors->first('fechaPago', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="notas" class="form-label">Notas:</label>
            <textarea class="form-control" name="notas" placeholder="Notas">{{ old('notas') }}</textarea>
            {!! $errors->first('notas', '<span style="color: red;">:message</span>') !!}
        </div>
        <div>
            <label for="pagada" class="form-label">Pagada:</label>
            <br>
            <input class="form-check-input" type="radio" name="pagada" value="1"
                {{ old('pagada') == 'si' ? 'checked' : '' }}> Sí
            <br>
            <input class="form-check-input" type="radio" name="pagada" value="0"
                {{ old('pagada') == 'no' ? 'checked' : '' }}> No
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>

@endsection
