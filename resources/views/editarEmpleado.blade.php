@section('titulo', 'Modificación del empleado')

@extends('template')

@section('contenido')

    <form class="row g-3" action="{{ route('actualizarEmpleado', $empleado) }}" method="POST">
        @csrf
        <h1> Modificar un empleado: </h1>
        @method('PUT')
        <div class="col-md-3">
            <label for="nif">NIF:</label>
            <input type="text" class="form-control" id="nif" name="nif" placeholder="NIF"
                value="{{ old('nif') ?? $empleado->nif }}">
            {!! $errors->first('nif', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre:"
                value="{{ old('nombre') ?? $empleado->nombre }}">
            {!! $errors->first('nombre', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="clave">Clave:</label>
            <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave"
                value="{{ old('clave') ?? $empleado->clave }}">
            {!! $errors->first('clave', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="descripcion">Correo:</label>
            <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo"
                value="{{ old('correo') ?? $empleado->correo }}">
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono"
                value="{{ old('telefono') ?? $empleado->telefono }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"
                value="{{ old('direccion') ?? $empleado->direccion }} ">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="fechaAlta">Fecha de alta:</label>
            <input type="date" class="form-control" id="fechaAlta" name="fechaAlta"
                value="{{ old('fechaAlta', $empleado->fechaAlta), $empleado->fechaAlta }}">
            {!! $errors->first('fechaAlta', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div>
            <label for="tipo" class="form-label">Tipo de empleado:</label>
            <br>
            <input class="form-check-input" type="radio" name="tipo" value="1"
                {{ old('tipo', $empleado->tipo) == '1' ? 'checked' : '' }}> Operario
            <br>
            <input class="form-check-input" type="radio" name="tipo" value="0"
                {{ old('tipo', $empleado->tipo) == '0' ? 'checked' : '' }}> Administrador
        </div>

        <div class="row-3">
            <button type="submit" class="btn btn-success">✏️ Actualizar</button>
            <a class="btn btn-danger" href="{{ route('listaEmpleados') }}">🡰 Volver atrás</a>
        </div>

    </form>




@endsection
