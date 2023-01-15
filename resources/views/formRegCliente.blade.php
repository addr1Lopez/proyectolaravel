@section('titulo','Formulario de registro de empleados')

@extends('template')

@section('contenido')

<style>
    body {
        margin: 20px;
    }
</style>

<h1> Formulario de registro de cliente: </h1>

<form class="row g-3" method="post" action="{{route('formRegEmpleado')}}">
    @csrf
    <div class="col-md-3">
        <label for="validationDefault01" class="form-label">CIF:</label>
        <input type="text" class="form-control" name="cif" placeholder="CIF">
        {!!$errors->first('cif','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault02" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        {!!$errors->first('nombre','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefaultUsername" class="form-label">Correo:</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" class="form-control" name="correo" placeholder="Correo" aria-describedby="inputGroupPrepend2">
        </div>
        {!!$errors->first('correo','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault03" class="form-label">Teléfono:</label>
        <input type="text" class="form-control" name="telefono" placeholder="Teléfono">
        {!!$errors->first('telefono','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Cuenta corriente:</label>
        <input type="text" class="form-control" name="cuenta" placeholder="Cuenta corriente">
        {!!$errors->first('cuenta','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault05" class="form-label">Pais:</label>
        <input type="text" class="form-control" name="pais" placeholder="País">
        {!!$errors->first('pais','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault06" class="form-label">Moneda:</label>
        <input type="text" class="form-control" name="moneda" placeholder="Moneda">
        {!!$errors->first('moneda','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault07" class="form-label">Importe cuota mensual:</label>
        <input type="text" class="form-control" name="cuota" placeholder="Importe cuota mensual">
        {!!$errors->first('cuota','<span style="color: red;">:message</span>')!!}
    </div>
    

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
</form>












@endsection