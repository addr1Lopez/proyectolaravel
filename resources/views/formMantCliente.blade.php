@section('titulo','Formulario de mantenimiento')

@extends('template')

@section('contenido')

<h1> Formulario de mantenimiento: </h1>

<form class="row g-3" method="post" action="{{route('formMantCliente')}}">
    @csrf
    <div class="col-md-3">
        <label for="validationDefault01" class="form-label">Concepto</label>
        <input type="text" class="form-control" name="concepto" placeholder="Concepto">
        {!!$errors->first('concepto','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault02" class="form-label">Fecha de emisión:</label>
        <input type="text" class="form-control" name="fechaEmision" placeholder="Fecha de emisión">
        {!!$errors->first('fechaEmision','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault03" class="form-label">Importe:</label>
        <input type="text" class="form-control" name="importe" placeholder="Importe">
        {!!$errors->first('importe','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault04" class="form-label">Fecha de pago:</label>
        <input type="date" class="form-control" name="fechaPago">
        {!!$errors->first('fechaPago','<span style="color: red;">:message</span>')!!}
    </div>
    <div class="col-md-3">
        <label for="validationDefault05" class="form-label">Notas:</label>
        <input type="text" class="form-control" name="cuenta" placeholder="Notas">
        {!!$errors->first('notas','<span style="color: red;">:message</span>')!!}
    </div>
    <div>
        <label for="validationDefault08" class="form-label">Pagada:</label>
        <br>
        <input class="form-check-input" type="radio" name="tipo" value="si"> Sí
        <br>
        <input class="form-check-input" type="radio" name="tipo" value="no"> No
    </div>

    

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
</form>



