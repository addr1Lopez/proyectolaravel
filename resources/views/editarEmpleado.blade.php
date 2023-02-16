@section('titulo', 'Modificación del empleado')

@extends('template')

@section('contenido')

    <form class="row g-3" action="{{ route('actualizarEmpleado', $empleado) }}" method="POST">
        @csrf
        <h1> Modificación del empleado: </h1>
        @method('PUT')
        <div class="col-md-3">
            <label for="nif">NIF:</label>
            <input type="text" class="form-control" id="nif" name="nif"
                value="{{ old('nif') ?? $empleado->nif }}">
            {!! $errors->first('nif', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="{{ old('nombre') ?? $empleado->nombre }}">
            {!! $errors->first('nombre', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="clave">Contraseña:</label>
            <input type="text" class="form-control" id="password" name="password"
                value="{{ old('password') ?? $empleado->password }}">
            {!! $errors->first('password', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="descripcion">Email:</label>
            <input type="text" class="form-control" id="email" name="email"
                value="{{ old('email') ?? $empleado->email }}">
            {!! $errors->first('email', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono"
                value="{{ old('telefono') ?? $empleado->telefono }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <br>
        <div class="col-md-3">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control" id="direccion" name="direccion"
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
            <button type="submit" class="btn btn-success"><i class="bi bi-pencil"></i> Actualizar</button>
            <a class="btn btn-danger" href="{{ route('listaEmpleados') }}"><i class="bi bi-backspace"></i> Volver atrás</a>
        </div>

    </form>




@endsection
