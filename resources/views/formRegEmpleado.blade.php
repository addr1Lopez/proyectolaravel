@section('titulo', 'Formulario de registro de empleados')

@extends('template')

@section('contenido')

    <h1> Formulario de registro de empleados: </h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form class="row g-3" method="post" action="{{ route('formRegEmpleado') }}">
        @csrf
        <div class="col-md-3">
            <label for="validationDefault01" class="form-label">NIF:</label>
            <input type="text" class="form-control" name="nif" placeholder="NIF" id="validationDefault01" value="{{ old('nif') }}">
            {!! $errors->first('nif', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault02" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="validationDefault02" value="{{ old('nombre') }}">
            {!! $errors->first('nombre', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault02" class="form-label">Clave:</label>
            <input type="text" class="form-control" name="clave" placeholder="Clave" id="validationDefault02" value="{{ old('clave') }}">
            {!! $errors->first('clave', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefaultUsername" class="form-label">Correo:</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="text" class="form-control" name="correo" placeholder="Correo"
                    id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" value="{{ old('correo') }}">
            </div>
            {!! $errors->first('correo', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault03" class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" placeholder="Teléfono" id="validationDefault03" value="{{ old('telefono') }}">
            {!! $errors->first('telefono', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="direccion" placeholder="Dirección" id="validationDefault04" value="{{ old('direccion') }}">
            {!! $errors->first('direccion', '<span style="color: red;">:message</span>') !!}
        </div>
        <div class="col-md-3">
            <label for="validationDefault05" class="form-label">Fecha de alta:</label>
            <input type="date" class="form-control" name="fechaAlta" id="validationDefault05" value="{{ old('fechaAlta') }}">
            {!! $errors->first('fecha', '<span style="color: red;">:message</span>') !!}
        </div>
        <div>
            <label for="validationDefault06" class="form-label">Tipo de empleado:</label>
            <br>
            <input class="form-check-input" type="radio" name="tipo" value="1" {{ old('tipo') == '1' ? 'checked' : '' }}> Operario
            <br>
            <input class="form-check-input" type="radio" name="tipo" value="0" {{ old('tipo') == '0' ? 'checked' : '' }}> Administrador
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>












@endsection
