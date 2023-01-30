@section('titulo', 'Modificación de la tarea / incidencia')

@extends('template')

@section('contenido')

    <form class="row g-3" action="{{ route('actualizar', $tarea) }}" method="POST">
        @csrf
        <h1> Modificar una tarea / incidencia: </h1>
        @method('PUT')
        <div class="col-md-3">
            <label for="cliente">Cliente:</label>
            <select class="form-select" name="cliente">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->cif }}" {{ old('cliente') == $cliente->cif ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('cliente', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="persona">Persona de contacto:</label>
            <input type="text" class="form-control" id="persona" name="persona" placeholder="Persona de contacto"
                value="{{ old('persona') ?? $tarea->persona }}">
            {!! $errors->first('persona', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono"
                value="{{ old('telefono') ?? $tarea->telefono }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="descripcion">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"
                value="{{ old('descripcion') ?? $tarea->descripcion }}">
            {!! $errors->first('descripcion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="correo">Correo:</label>
            <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo"
                value="{{ old('correo') ?? $tarea->correo }}">
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"
                value="{{ old('direccion') ?? $tarea->direccion }} ">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="poblacion">Población:</label>
            <input type="text" class="form-control" id="poblacion" name="poblacion" placeholder="Población"
                value="{{ old('poblacion') ?? $tarea->poblacion }} ">
            {!! $errors->first('poblacion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="codigoPostal">Código postal:</label>
            <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Código postal"
                value="{{ old('codigoPostal') ?? $tarea->codigoPostal }} ">
            {!! $errors->first('codigoPostal', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="provincia">Provincia:</label>
            <select class="form-select" name="provincia">
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->codPoblacion }}"
                        {{ old('provincia') == $provincia->codPoblacion ? 'selected' : ($tarea->provincia == $provincia->codPoblacion ? 'selected' : '') }}>
                        {{ $provincia->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('provincia', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="operarioEncargado">Operario Encargado:</label>
            <select class="form-select" name="operarioEncargado">
                @foreach ($empleados as $empleado)
                    @if ($empleado->tipo == 1)
                        <option value="{{ $empleado->nif }}"
                            {{ old('operarioEncargado') == $empleado->nif || (old('operarioEncargado') == null && $tarea->operarioEncargado == $empleado->nif) ? 'selected' : '' }}>
                            {{ $empleado->nombre }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('operarioEncargado', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
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
            <label for="fechaRealizacion">Fecha de realización:</label>
            <input type="date" class="form-control" id="fechaRealizacion" name="fechaRealizacion"
                value="{{ old('fechaRealizacion', $tarea->fechaRealizacion), $tarea->fechaRealizacion }}">
            {!! $errors->first('fechaRealizacion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="anotaciones_anteriores">Anotaciones anteriores:</label>
            <textarea class="form-control" id="anotaciones_anteriores" name="anotaciones_anteriores"
                placeholder="Anotaciones anteriores">{{ old('anotaciones_anteriores') ?? $tarea->anotaciones_anteriores }}
            </textarea>
            {!! $errors->first('anotaciones_anteriores', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="anotaciones_posteriores">Anotaciones posteriores:</label>
            <textarea class="form-control" id="anotaciones_posteriores" name="anotaciones_posteriores"
                placeholder="Anotaciones posteriores">{{ old('anotaciones_posteriores') ?? $tarea->anotaciones_posteriores }}
            </textarea>
            {!! $errors->first('anotaciones_posteriores', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="fechaCreacion">Fecha de creación:</label>
            <span type="text" name="fechaCreacion" class="form-control" id="fechaCreacion"
                placeholder="fechaCreacion">{{ date('d-m-Y', strtotime($tarea->fechaCreacion)) }}</span>
        </div>
        <div class="row-3">
            <button type="submit" class="btn btn-success">✏️ Actualizar</button>
            <a class="btn btn-danger" href="{{ route('listaTareas') }}">🡰 Volver atrás</a>
        </div>

    </form>




@endsection
