@section('titulo', 'Añadir una tarea / incidencia:')

@extends('template')

@section('contenido')

    <style>
        #formulario {
            margin: 20px;
        }
    </style>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form id="formulario" class="row g-3" method="post" action="{{ route('formularioTarea') }}">
        @csrf
        <h1> Añadir una tarea / incidencia: </h1>

        <div class="col-md-3">
            <label for="cliente" class="form-label">Cliente que encarga el trabajo:</label>
            <select class="form-select" name="cliente">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->cif }}" {{ old('cliente') == $cliente->cif ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('operarioEncargado', '<span style=color:red>:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="persona" class="form-label">Persona de contacto:</label>
            <input type="text" class="form-control" name="persona" placeholder="Nombre, Apellidos"
                value="{{ old('persona') }}">
            {!! $errors->first('persona', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción"
                value="{{ old('descripcion') }}">
            {!! $errors->first('descripcion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefaultUsername" class="form-label">Correo:</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" name="correo" placeholder="Correo"
                    aria-describedby="inputGroupPrepend2" value="{{ old('correo') }}">
            </div>
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="direccion" placeholder="Dirección"
                value="{{ old('direccion') }}">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="poblacion" class="form-label">Población:</label>
            <input type="text" class="form-control" name="poblacion" placeholder="Población"
                value="{{ old('poblacion') }}">
            {!! $errors->first('poblacion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="codigoPostal" class="form-label">Código postal:</label>
            <input type="text" class="form-control" name="codigoPostal" placeholder="Código postal"
                value="{{ old('codigoPostal') }}">
            {!! $errors->first('codigoPostal', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="provincia" class="form-label">Provincia:</label>
            <select class="form-select" name="provincia">
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->nombre }}"
                        {{ old('provincia') == $provincia->nombre ? 'selected' : '' }}>
                        {{ $provincia->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('provincia', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="operario" class="form-label">Operario encargado</label>
            <select class="form-select" name="operarioEncargado">
                @foreach ($empleados as $empleado)
                    @if ($empleado->tipo == 1)
                        <option value="{{ $empleado->nif }}"
                            {{ old('operarioEncargado') == $empleado->nif ? 'selected' : '' }}>{{ $empleado->nombre }}
                        </option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('operarioEncargado', '<span style=color:red>:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="estado" class="form-label">Estado:</label>
            <select class="form-select" name="estado" id="estado">
                <option value="P">P - Pendiente</option>
                <option value="R">R - Realizada</option>
                <option value="C">C - Cancelada</option>
            </select>
            {!! $errors->first('estado', '<span style="color: red;">:message</span>') !!}
        </div>

        <div class="col-md-3">
            <label for="fechaRealizacion" class="form-label">Fecha de realización:</label>
            <input type="date" class="form-control" name="fechaRealizacion" placeholder="Fecha de realización"
                value="{{ old('fechaRealizacion') }}">
            {!! $errors->first(
                'fechaRealizacion',
                '<span style="color: red;">La fecha de realización tiene que ser posterior al día de hoy.</span>',
            ) !!}
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
@endsection
