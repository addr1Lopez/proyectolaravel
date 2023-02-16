@section('titulo', 'Formulario de registro de empleados')

@extends('template')

@section('contenido')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form id="formulario" class="row g-3" method="post" action="{{ route('formularioEmpleado') }}">
        @csrf
        <h1> Formulario de registro de empleados: </h1>
        <hr>
        <div class="col-md-3">
            <label for="validationDefault01" class="form-label">NIF:</label>
            <input type="text" class="form-control" name="nif" placeholder="NIF" id="validationDefault01"
                value="{{ old('nif') }}">
            {!! $errors->first('nif', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault02" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="validationDefault02"
                value="{{ old('nombre') }}">
            {!! $errors->first('nombre', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault02" class="form-label">Contraseña:</label>
            <input type="text" class="form-control" name="password" placeholder="Contraseña" id="validationDefault02"
                value="{{ old('password') }}">
            {!! $errors->first('password', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefaultUsername" class="form-label">Email:</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" name="email" placeholder="Email"
                    id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" value="{{ old('email') }}">
            </div>
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault03" class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" placeholder="Teléfono" id="validationDefault03"
                value="{{ old('telefono') }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="direccion" placeholder="Dirección" id="validationDefault04"
                value="{{ old('direccion') }}">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault05" class="form-label">Fecha de alta:</label>
            <input type="date" class="form-control" name="fechaAlta" id="validationDefault05"
                value="{{ old('fechaAlta') }}">
            {!! $errors->first('fecha', '<span style="color: red;">:message</span>') !!}
        </div>
        <div>
            <label for="validationDefault06" class="form-label">Tipo de empleado:</label>
            <br>
            <input class="form-check-input" type="radio" name="tipo" value="1"
                {{ old('tipo') == '1' ? 'checked' : '' }}> Operario
            <br>
            <input class="form-check-input" type="radio" name="tipo" value="0"
                {{ old('tipo') == '0' ? 'checked' : '' }}> Administrador
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar</button>
            <a class="btn btn-danger" href="{{ route('listaEmpleados') }}"><i class="bi bi-backspace"></i> Volver a empleados</a>
        </div>
    </form>
@endsection
