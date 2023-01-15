@section('titulo','Formulario de registro de empleados')

@extends('template')

@section('contenido')

<style>
    body {
        margin: 20px;
    }
</style>

<h1> Formulario de registro de empleados: </h1>

<form class="row g-3" method="post" action="{{route('formRegEmpleado')}}">
    @csrf
    <div class="col-md-3">
        <label for="validationDefault01" class="form-label">DNI:</label>
        <input type="text" class="form-control" name="dni" placeholder="DNI" id="validationDefault01">
        {!!$errors->first('dni','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault02" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="validationDefault02">
        {!!$errors->first('nombre','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefaultUsername" class="form-label">Correo:</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" class="form-control" name="correo" placeholder="Correo" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2">
        </div>
        {!!$errors->first('correo','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault03" class="form-label">Teléfono:</label>
        <input type="text" class="form-control" name="telefono" placeholder="Teléfono" id="validationDefault03">
        {!!$errors->first('telefono','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Dirección:</label>
        <input type="text" class="form-control" name="direccion" placeholder="Dirección" id="validationDefault04">
        {!!$errors->first('direccion','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault05" class="form-label">Fecha de alta:</label>
        <input type="date" class="form-control" name="fechaAlta" id="validationDefault05">
        {!!$errors->first('fecha','<span style="color: red;">:message</span>')!!}
    </div>
    <div>
        <label for="validationDefault06" class="form-label">Tipo de empleado:</label>
        <br>
        <input class="form-check-input" type="radio" name="tipo" value="operario"> Operario
        <br>
        <input class="form-check-input" type="radio" name="tipo" value="administrador"> Administrador
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
</form>












@endsection