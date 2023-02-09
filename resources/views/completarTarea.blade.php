@section('titulo', 'Completar tarea')

@extends('template')

@section('contenido')

    <form class="row g-3" action="{{ route('completarTarea', $tarea) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1> Completar tarea {{ $tarea->id }}: </h1>
        @method('PUT')
        <div class="col-md-3">
            <label for="estado">Estado:</label>
            <select class="form-select" name="estado" id="estado">
                <option value="P" {{ old('estado') == 'P' ? 'selected' : ($tarea->estado == 'P' ? 'selected' : '') }}>
                    P - Pendiente</option>
                <option value="R" {{ old('estado') == 'R' ? 'selected' : ($tarea->estado == 'R' ? 'selected' : '') }}>
                    R - Realizada</option>
                <option value="C" {{ old('estado') == 'C' ? 'selected' : ($tarea->estado == 'C' ? 'selected' : '') }}>
                    C - Cancelada</option>
            </select> {!! $errors->first('estado', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="anotaciones_anteriores" class="form-label">Anotaciones anteriores: </label>
            <textarea class="form-control" name="anotaciones_anteriores" id="anotaciones_anteriores" cols="30" rows="4">{{ old('anotaciones_anteriores') ?? $tarea->anotaciones_anteriores }}</textarea>
            {!! $errors->first('anotaciones_anteriores', '<b style="color: red">:message</b>') !!}
        </div>
        <div class="col-md-3">
            <label for="anotaciones_posteriores" class="form-label">Anotaciones posteriores: </label>
            <textarea class="form-control" name="anotaciones_posteriores" id="anotaciones_posteriores" cols="30" rows="4">{{ old('anotaciones_anteriores') ?? $tarea->anotaciones_anteriores }}</textarea>
            {!! $errors->first('anotaciones_posteriores', '<b style="color: red">:message</b>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="fichero">Fichero:</label>
            <input type="file" name="fichero" class="form-control" id="fichero" value="{{ old('fichero') }}">
        </div>
        <br>
        
        <div class="row-3">
            <button type="submit" class="btn btn-success">✅ Completar</button>
            <a class="btn btn-danger" href="{{ route('listaTareas') }}">🡰 Volver atrás</a>
        </div>

    </form>




@endsection
